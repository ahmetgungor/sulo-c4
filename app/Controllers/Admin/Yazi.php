<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use \App\Models\LoginModel;
use Config\Services; //session işlemleri için ekle
use \App\Models\PageModel;
use App\Models\ResimModel;
use \App\Models\MenuModel;

class Yazi extends BaseController
{
    private $db;

    public function __construct()
	{	
		//session tanımla
		$this->session = Services::session();
		$this->db = \Config\Database::connect();
	}


    function rssRead($tip=null)
    {
        $data['site'] = $site = $this->request->getGet('site');
        $data['dil'] = $dil =  $this->request->getGet('dil');
        $data['savee'] = $savee =  $this->request->getGet('save');
        $data['tip'] = $tip;
        $url = $data['url'] = $this->request->getGet("url");
        $resim = new ResimModel();
        $page = new PageModel();
        // kaydet
        if(!empty($savee))
        {
            $savee = \json_decode(base64_decode($savee),true);
            \print_r($savee);

            $sav['baslik']     = $savee['baslik'];
            $sav['link']       = url_title($savee['baslik'],'-',true);
            $sav['aciklama']   = $savee['aciklama'];;
            $sav['g_title']    = $savee['baslik'];
            $sav['g_desc']     = $savee['baslik'];;
            $sav['g_keyw']     = ' ';
            
            $sav['dil'] = $dil;
            $sav['site'] = $site;
            $sav['ekalan'] = '';
            $sav['tip'] = $tip;
            //NOTE:İçerik Yayınlansınmı 
            $sav['yayin'] = 1;
            
            $sav['tasarim'] ='page';
            $sav['ustmenu'] = 0;
            if(!empty($savee['resim']))
            {
                $time = time();
                $mime = $this->imageMime($savee['resim']);
                list($type,$mim) = \explode('/',$mime);
              
                //echo url_title("asd aiş ğüasd");
               echo $this->urlDownloadImage(
                    $savee['resim'],
                    ROOTPATH.'public_html/uploads',
                    $time.'.'.$mim
                );


                $res['resim'] = $time.'.'.$mim;
               
            }
             

            if(!$page->save($sav))
            {
                
                return redirect()->back()->withInput()->with('errors', $page->errors());
            }else{
                $lastid= $page->getInsertID();
                if(!empty($savee['resim']))
                {
                $res['yaziid'] = $lastid;
                $res['onecikan'] =1;
                $resim->save($res);
                }
               
                return redirect()->to(base_url('admin/yazi/index/'.$tip.'/1?id='.$lastid))->with('success',
                'Yeni İçerik Başarılı Şekilde Eklendi');
            }
            
        }


        if(!empty($url))
        {
        $url =simplexml_load_file(urldecode($url),'SimpleXMLElement', LIBXML_NOCDATA);
        $save=[]; 
        $key =0;
        foreach ($url->channel->item as $i =>$value) {
           
            $value =(array)$value;
            $save[$key]['aciklama'] = strip_tags($value['description']); 
            $save[$key]['baslik'] =  strip_tags($value['title']);
            $save[$key]['link'] = url_title(strip_tags($value['title']),'-',true);
            if(array_key_exists('image',$value)){
                $save[$key]['resim'] = $value['image'];
            }
            if(array_key_exists('img',$value)){
                $save[$key]['resim'] = $value['img'];
            }
            if(array_key_exists('enclosure',$value))
            {
                $enclosure = (array)$value['enclosure'];
                if(\array_key_exists('@attributes',$enclosure))
                {
                    //resim url
                  $save[$key]['resim'] =  $enclosure['@attributes']['url'];
                }
            }
            
            $key++;
        }
        }else{
            $save= [];
            return redirect()->to(base_url("admin/yazi/rssRead/".$tip."?site=".$site."&dil=".$dil."&url=https://www.cnnturk.com/feed/rss/spor/news"))->with('errors',["Lütfen Url Alanına Rss Adresi Girin"]);
        }
        $data['list'] = $save;
        return \admin_("rss_list",$data,"Haber Listesi");
       
    }

    function test()
    {
        $mime = $this->imageMime("https://i.hizliresim.com/vKQa8j.png");
        list($type,$mim) = \explode('/',$mime);
      
        //echo url_title("asd aiş ğüasd");
       echo $this->urlDownloadImage(
            'https://i.hizliresim.com/vKQa8j.png',
            ROOTPATH.'public_html/uploads',
            'test.'.$mim
        ); /**/
    }

    function imageMime($url)
    {
        $ch = curl_init();
           
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, 1);
            curl_setopt($ch, CURLOPT_NOBODY, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $results = explode("\n", trim(curl_exec($ch)));
            foreach($results as $line) {
                if (strtolower(strtok($line, ':')) == 'content-type') {
                    $parts = explode(":", $line);
                    return trim($parts[1]);
                }
            }
    }


    function urlDownloadImage($url,$savePath,$name)
    {
        
        $fp = fopen ($savePath.'/'.$name, 'w+');              // open file handle

        $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // enable if you want
        curl_setopt($ch, CURLOPT_FILE, $fp);          // output to file
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1000);      // some large value to allow curl to run for a long time
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
        // curl_setopt($ch, CURLOPT_VERBOSE, true);   // Enable this line to see debug prints
        curl_exec($ch);

        curl_close($ch);                              // closing curl handle
        return $fp;
        fclose($fp);                                  // closing file handle
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

    public function klist($tip=null)
    {
        $data['tip'] = $tip;
        $data['site'] = $site = $this->request->getGet('site');
        $data['dil'] = $dil =  $this->request->getGet('dil');
        $data['save'] = $save =  $this->request->getGet('save');
        $data['pagedb'] = $page = new PageModel();
        $resim = new ResimModel();
        if(!empty($save))
        {
            $s = \json_decode(base64_decode($save),true);
            $sav['baslik']     = $s['baslik'];
            $sav['link']       = url_title($s['baslik'],'-',true);
            $sav['aciklama']   = ' ';
            $sav['g_title']    = $s['baslik'];
            $sav['g_desc']     = ' ';
            $sav['g_keyw']     = ' ';
            
            $sav['dil'] = $dil;
            $sav['site'] = $site;
            $sav['ekalan'] = 'https://channel009.b-cdn.net/'.$s['id'].'-0028.m3u8';
            $sav['tip'] = $tip;
            //NOTE:İçerik Yayınlansınmı 
            $sav['yayin'] = 1;
            
            $sav['tasarim'] ='page';
            $sav['ustmenu'] = 0;
            if(!empty($s['icon']))
            {
                $time = time();
                $mime = $this->imageMime($s['icon']);
                list($type,$mim) = \explode('/',$mime);
              
                //echo url_title("asd aiş ğüasd");
               echo $this->urlDownloadImage(
                    $s['icon'],
                    ROOTPATH.'public_html/uploads',
                    $time.'.'.$mim
                );


                $res['resim'] = $time.'.'.$mim;
               
            }
             

            if(!$page->save($sav))
            {
                
                return redirect()->back()->withInput()->with('errors', $page->errors());
            }else{
                $lastid= $page->getInsertID();
                if(!empty($s['icon']))
                {
                $res['yaziid'] = $lastid;
                $res['onecikan'] =1;
                $resim->save($res);
                }
                $menuDb = new MenuModel();

                $menu['baslik']     = 'KanalListesi';
                $menu['site']       = $site;
                $menu['dil']        = $dil;
                $menu['yazi_id']    =$lastid;
                $menu['kategori']   = ($tip== 3)?1:0;
                $menu['uid']        = 0;
                $menuDb->save($menu);
                return redirect()->to(base_url('admin/yazi/index/'.$tip.'/1?id='.$lastid))->with('success',
                'Yeni İçerik Başarılı Şekilde Eklendi');
            }
            
        }


        return \admin_("kanal_list",$data,"Otomatik Kanal Listesi");
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
            $data['ekalan'] = old('ekalan');
          
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
            $data['ekalan'] =$row['ekalan'];
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
        $data['ekalan'] = $this->request->getPost('ekalan');
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
        $data['ekalan'] = $this->request->getPost('ekalan');
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