<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use \App\Models\LoginModel;
use Config\Services; //session işlemleri için ekle
use \App\Models\PageModel;

class Yazi extends BaseController
{
    private $db;

    public function __construct()
	{	
		//session tanımla
		$this->session = Services::session();
		$this->db = \Config\Database::connect();
	}


    public function delete()
    {
        $id = $data['id'] = $this->request->getGet('id');
        $tip =$data['tip'] = $this->request->getGet("tip");
        $site = $data['site'] = $this->request->getGet("site");
        $dil = $data['dil'] = $this->request->getGet("dil");
        
        //http://127.0.0.2/admin/yazi/list/1?site=localhost&dil=1
        $pageModel = new PageModel();
        $a = $pageModel->where('id',$id)->get()->getRow();
        $result = $this->db->table('resim')->where('yaziid',$a->id)->get()->getResult();
        $query = $this->db->query('select count(yaziid) as num_rows from resim where yaziid=?',$a->id)->getRow();
        
        if($query->num_rows != 0)
        {
            foreach ($result as $key => $value)
            {
                @unlink(ROOTPATH.'public/uploads'.$value->resim); 
                $this->db->table('resim')->delete(['id'=>$value->id]);
            }
            
        }

        $menu_num = $this->db->query('select count(yazi_id) as num_rows from menuid where yazi_id=?',$a->id)->getRow();

        if($menu_num->num_rows == 0)
        {
            $a = $pageModel->delete($id);
            if($a)
            {
                return  redirect()->to(base_url("admin/yazi/list/".$tip."?site=".$site."&dil=".$dil))->with('success',"Silme İşlemi Başarılı");
            }
        }else{
            $btn = '<a href="'.base_url("admin/menu/index").'" class="btn btn-info btn-large">Menu de Görüntüle</a>';
            return redirect()->to(base_url("admin/yazi/list/".$tip."?site=".$site."&dil=".$dil))->with('errors',["Menu Alanında Bu İçerik Kullanıldığı için Silme İşlemi Yapılamadi",$btn]);
        }
        
    }

    public function list($tip=null)
    {
        $data['tip'] = $tip;
        $data['site'] = $site = $this->request->getGet('site');
        $data['dil'] = $dil =  $this->request->getGet('dil');
        $data['pagedb'] = $pagedb = new PageModel();
        
        return \admin_("page_list",$data,"İçerik Listesi");
    }

    public function index(int $tip = null,int $yaziid=null)
    {
        $data['tip'] = $tip;
        $data['yaziid'] = $yaziid;
        $page = new PageModel();
        
        $id = $data['id']= $this->request->getGet('id');
        
        if(empty($id))
        {
            $data['baslik'] = old('baslik');
            $data['link'] = old('link');
            $data['aciklama'] = old('aciklama');
            $data['g_title'] = old('title');
            $data['g_desc'] = old('g_desc');
            $data['g_keyw'] = old('g_keyw');
            
            $data['dil'] = old('dil');
            $data['site'] = old('site');
            $data['yayin'] = 1;

            $data['tasarim'] = old('tasarim');
            $data['ustmenu'] = old('ustmenu');
          
        }else{
            $row = $page->find($id);
            $data['baslik'] =$row['baslik'];
            $data['link'] =$row['link'];
            $data['aciklama'] =$row['aciklama'];
            $data['g_title'] =$row['g_title'];
            $data['g_desc'] =$row['g_desc'];
            $data['g_keyw'] =$row['g_keyw'];
            
            $data['dil'] =$row['dil'];
            $data['site'] =$row['site'];
            
            $data['yayin'] = $row['yayin'];
            $data['tasarim'] = $row['tasarim'];
            $data['ustmenu'] = $row['ustmenu'];
        }
        
       


        return admin_('yazi',$data,'İçerik İşlemleri');
    }


    function kategori(int $tip = null,int $yaziid=null)
    {
        $data['tip'] = $tip;
        $data['yaziid'] = $yaziid;
        $page = new PageModel();
        
        $id = $data['id']= $this->request->getGet('id');
        
        if(empty($id))
        {
            $data['baslik'] = old('baslik');
            $data['link'] = old('link');
            $data['aciklama'] = old('aciklama');
            $data['g_title'] = old('title');
            $data['g_desc'] = old('g_desc');
            $data['g_keyw'] = old('g_keyw');
            
            $data['dil'] = old('dil');
            $data['site'] = old('site');
            $data['yayin'] = 1;

            $data['tasarim'] = old('tasarim');
            $data['ustmenu'] = old('ustmenu');
          
        }else{
            $row = $page->find($id);
            $data['baslik'] =$row['baslik'];
            $data['link'] =$row['link'];
            $data['aciklama'] =$row['aciklama'];
            $data['g_title'] =$row['g_title'];
            $data['g_desc'] =$row['g_desc'];
            $data['g_keyw'] =$row['g_keyw'];
            
            $data['dil'] =$row['dil'];
            $data['site'] =$row['site'];
            
            $data['yayin'] = $row['yayin'];
            $data['tasarim'] = $row['tasarim'];
            $data['ustmenu'] = $row['ustmenu'];
        }
        
        return admin_('kategori',$data,'Kategori İşlemleri');
    }


    function indexPOST($tip=0, $yaziid=0)
    {
       
        $page = new PageModel();

        $data['baslik'] = $this->request->getPost('baslik');
        $data['link'] = $this->request->getPost('link');
        $data['aciklama'] = $this->request->getPost('aciklama');
        $data['g_title'] = $this->request->getPost('title');
        $data['g_desc'] = $this->request->getPost('g_desc');
        $data['g_keyw'] = $this->request->getPost('g_keyw');
        
        $data['dil'] = $this->request->getPost('dil');
        $data['site'] = $this->request->getPost('site');
        $data['tip'] = $tip;
        //NOTE:İçerik Yayınlansınmı 
        $yayin = $this->request->getPost('yayin');
        if(isset($yayin) || !empty($yayin))
        {
            $data['yayin'] = 1;
        }else{
            $data['yayin'] = 0;
        }

        $data['tasarim'] = $this->request->getPost('tasarim');
        $data['ustmenu'] = $this->request->getPost('ustmenu');
        
        $page->setValidationRules([
            'baslik' =>[
				'label'=>'Baslik Alanı',
				'rules'=>'required|min_length[3]',
				'errors'=>[
					'required'=>'Baslik Alanı Boş Bırakılamaz',
					'min_length'=>'Baslik En Az 3 Karakter Olmak Zorunda'
				]
            ],
            'link' =>[
				'label'=>'Link Alanı',
				'rules'=>'required|min_length[3]',
				'errors'=>[
					'required'=>'Link Alanı Boş Bırakılamaz',
					'min_length'=>'Link En Az 3 Karakter Olmak Zorunda'
				]
			]
        ]);

        if(!$page->save($data))
		{
			
			return redirect()->back()->withInput()->with('errors', $page->errors());
		}else{
			$lastid= $page->getInsertID();
			return redirect()->to(base_url('admin/yazi/index/'.$tip.'/'.$yaziid.'?id='.$lastid))->with('success',
			'Yeni İçerik Başarılı Şekilde Eklendi');
		}

    }


    function indexUPDATE($tip=0, $yaziid=0)
    {
       
        $id = $this->request->getGet('id');
        $page = new PageModel();

        $data['baslik'] = $this->request->getPost('baslik');
        $data['link'] = $this->request->getPost('link');
        $data['aciklama'] = $this->request->getPost('aciklama');
        $data['g_title'] = $this->request->getPost('title');
        $data['g_desc'] = $this->request->getPost('g_desc');
        $data['g_keyw'] = $this->request->getPost('g_keyw');
        
        $data['dil'] = $this->request->getPost('dil');
        $data['site'] = $this->request->getPost('site');
        $data['tip'] = $tip;
        //NOTE:İçerik Yayınlansınmı 
        $yayin = $this->request->getPost('yayin');
        if(isset($yayin) || !empty($yayin))
        {
            $data['yayin'] = 1;
        }else{
            $data['yayin'] = 0;
        }

        $data['tasarim'] = $this->request->getPost('tasarim');
        $data['ustmenu'] = $this->request->getPost('ustmenu');
        
        $page->setValidationRules([
            'baslik' =>[
				'label'=>'Baslik Alanı',
				'rules'=>'required|min_length[3]',
				'errors'=>[
					'required'=>'Baslik Alanı Boş Bırakılamaz',
					'min_length'=>'Baslik En Az 3 Karakter Olmak Zorunda'
				]
            ],
            'link' =>[
				'label'=>'Link Alanı',
				'rules'=>'required|min_length[3]',
				'errors'=>[
					'required'=>'Link Alanı Boş Bırakılamaz',
					'min_length'=>'Link En Az 3 Karakter Olmak Zorunda'
				]
			]
        ]);

        if(!$page->update($id,$data))
		{
			
			return redirect()->back()->withInput()->with('errors', $page->errors());
		}else{
			
			return redirect()->to(base_url('admin/yazi/index/'.$tip.'/'.$yaziid.'?id='.$id))->with('success',
			' İçerik Güncelleme Başarılı');
		}

    }

    
}
?>