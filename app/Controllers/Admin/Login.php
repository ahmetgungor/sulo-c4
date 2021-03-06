<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use \App\Models\LoginModel;
use Config\Services; //session işlemleri için ekle

class Login extends BaseController
{
	protected $session;
	protected $id;
	public function __construct()
	{
		
		//session tanımla
		$this->session = Services::session();
		$session =	\Config\Services::session();
		$status = $session->get('status');	
       
	}

	public function userList()
	{
		$user = new LoginModel();
		$data['userlist'] = $user->orderBy('id','desc')->findAll();
		return admin_('loginUserList',$data,'Kullanıcı Listesi');
	}

	public function index($id=null)
	{
		$this->id =  $id;
		$user = new LoginModel();
		$data['id'] = $id;

		$data['user'] = [
			'kadi'=>old('kadi'),
			'isimsoyisim'=>old('isimsoyisim'),
			'email'=>old('email'),
			'gsm'=>old('gsm'),
			'dogumtarihi'=>'',
			'notalani'=>'',
			'tc'=>''
		];
		if(!empty($this->id) && isset($this->id))
		{
			$row = $user->find($this->id);
			$data['user'] = [
				'kadi'=>$row['kadi'],
				'isimsoyisim'=>$row['isimsoyisim'],
				'email'=>$row['email'],
				'gsm'=>$row['gsm'],
				'dogumtarihi'=>$row['dogumtarihi'],
				'notalani'=>$row['aciklama'],
				'tc'=>$row['tc']
			];
		}
		return admin_('login',$data,'Kullanıcı İşlemleri');
	}

	public function indexPost()
	{
		
		//\print_r($user->get());
		$user = new LoginModel();
		$us =[
			'kadi'=> $this->request->getPost('kadi'),
			'isimsoyisim'=>$this->request->getPost('isimsoyisim'),
			'sifre'=>md5($this->request->getPost('sifre')),
			'email'=>$this->request->getPost('email'),
			'gsm'=>$this->request->getPost('gsm'),
			'//dogumtarihi'=>$this->request->getPost('dogumtarihi'),
			'aciklama'=>$this->request->getPost('notalani'),
			//'tc'=>$this->request->getPost('tc'),
			'gkodu'=>random_string('alnum', 32),
			'aktif'=>1
		];
		$user->setValidationRules([
			'kadi' =>[
				'label'=>'Kullanıcı Adı',
				'rules'=>'required|min_length[3]',
				'errors'=>[
					'required'=>'Kullanıcı Alanı Boş Bırakılamaz',
					'min_length'=>'Kullanıcı Adı En Az 3 Karakter Olmak Zorunda'
				]
			],
			'isimsoyisim' => [
				'label'=>'İsim Soyisim',
				'rules'=>'required|min_length[3]',
				'errors'=>[
					'required'=>'İsim Soyisim Boş Bırakılamaz',
					'min_length'=>'İsim Soyisim En Az 3 Karakter Olmak Zorunda'
				]
			],
			'email' 	  => [
				'label'=>'Mail Adresi',
				'rules'=>'required|valid_email',
				'errors'=>[
					'required'=>'Mail Adresi Boş Bırakılamaz',
					'valid_email'=>'Lütfen Geçerli Bir Mail Adresi Girin'
				]
			],
			'gsm' => [
				'label'=>'Gsm',
				'rules'=>'required|min_length[10]',
				'errors'=>[
					'required'=>'Gsm Alanı Boş Bırakılamaz',
					'min_length'=>'Gsm En Az 10 Karakter Olmak Zorunda'
				]
			]
		]);
		
		if(!$user->save($us))
		{
			
			return redirect()->back()->withInput()->with('errors', $user->errors());
		}else{
			$userid= $user->getInsertID();
			return redirect()->to('login/edit/'.$userid.'?id='.$userid)->with('success',
			'Yeni Kullanıcı Başarılı Şekilde Eklendi');
		}
	}


	public function update($id=null)
	{
		//\print_r($user->get());
		$user = new LoginModel();
		$us =[
			'kadi'=> $this->request->getPost('kadi'),
			'isimsoyisim'=>$this->request->getPost('isimsoyisim'),
			
			'email'=>$this->request->getPost('email'),
			'gsm'=>$this->request->getPost('gsm'),
			//'dogumtarihi'=>$this->request->getPost('dogumtarihi'),
			'aciklama'=>$this->request->getPost('notalani'),
			//'tc'=>$this->request->getPost('tc'),
			'aktif'=>1
		];
		if(!empty($this->request->getPost('sifre')))
		{
			if($this->request->getPost('sifre') != $this->request->getPost('sifre2'))
			{
				return redirect()->to(base_url().'/admin/login/edit/'.$id.'?id='.$id)->with('error',
			'Şifreler Eşleşmiyor Yeniden Denyin');
				//'sifre'=>md5($this->request->getPost('sifre')),
			}else{
				$us['sifre']=md5($this->request->getPost('sifre'));
			}
		}
		
		//
		$user->setValidationRules([
			'kadi' =>[
				'label'=>'Kullanıcı Adı',
				'rules'=>'required|min_length[3]',
				'errors'=>[
					'required'=>'Kullanıcı Alanı Boş Bırakılamaz',
					'min_length'=>'Kullanıcı Adı En Az 3 Karakter Olmak Zorunda'
				]
			],
			'isimsoyisim' => [
				'label'=>'İsim Soyisim',
				'rules'=>'required|min_length[5]',
				'errors'=>[
					'required'=>'İsim Soyisim Boş Bırakılamaz',
					'min_length'=>'İsim Soyisim En Az 5 Karakter Olmak Zorunda'
				]
			],
			'email' 	  => [
				'label'=>'Mail Adresi',
				'rules'=>'required|valid_email',
				'errors'=>[
					'required'=>'Mail Adresi Boş Bırakılamaz',
					'valid_email'=>'Lütfen Geçerli Bir Mail Adresi Girin'
				]
			],
			'gsm' => [
				'label'=>'Gsm',
				'rules'=>'required|min_length[10]',
				'errors'=>[
					'required'=>'Gsm Alanı Boş Bırakılamaz',
					'min_length'=>'Gsm En Az 10 Karakter Olmak Zorunda'
				]
			]
		]);
		
		if(!$user->update($id,$us))
		{
			
			return redirect()->back()->withInput()->with('errors', $user->errors());
		}else{
			$userid= $user->getInsertID();
			return redirect()->to(base_url().'/admin/login/edit/'.$id.'?id='.$id)->with('success',
			'Yeni Kullanıcı Başarılı Şekilde Güncellendi');
		}
	}

	 function log_in()
	 {
		$data['test'] = '';
		

		return 	view('admin/log_in', $data);
	 }

	 function log_inPOST()
	 {
		$email = $this->request->getPost('email');
		$sifre = md5($this->request->getPost('sifre'));

		$user = new LoginModel();
		
		$u = $user->login($email,$sifre);
		
		if($u->toplam ==0)
		{
			return redirect()->back()->withInput()->with('errors',['Kullanıcı veya Şifre Hatalı']);
		}else{
			$session =	\Config\Services::session();
			$session->set([
				'status'=>true,
				'email'=>$u->email,
				'domain'=>$u->aciklama
			]);
			return redirect()->to(base_url('admin/ayar/index?promo=false&site='.$u->aciklama.'&dil=1'));
		}
		


	 }

	 function log_out()
	 {

	 }

}
?>