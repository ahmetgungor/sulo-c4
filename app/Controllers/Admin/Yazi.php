<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use \App\Models\LoginModel;
use Config\Services; //session işlemleri için ekle
use \App\Models\PageModel;

class Yazi extends BaseController
{
    public function __construct()
	{	
		//session tanımla
		$this->session = Services::session();
		
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