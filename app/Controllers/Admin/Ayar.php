<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use \App\Models\LoginModel;
use Config\Services; //session işlemleri için ekle
use \App\Models\AyarModel;
use CodeIgniter\API\ResponseTrait;


class Ayar extends BaseController
{
    public function __construct()
	{	
		$this->session = Services::session();
	}

    public function index()
    {
        $data['site'] = $site = $this->request->getGet('site');
        $data['dil'] = $dil = $this->request->getGet('dil');
        $data['promo'] = $promo = $this->request->getGet("promo");
        //pdata[site][img][arkaplan]
        
        $data['ayardb'] = $ayarDB = new AyarModel();
       
        $this->upload("arkaplan",'arkaplan',$site,$dil);
        $this->upload("logo",'logo',$site,$dil);
        
        $this->upload("reklam1",'reklam1',$site,$dil);
        $this->upload("reklam2",'reklam2',$site,$dil);
        $this->upload("reklam3",'reklam3',$site,$dil);

        echo $this->savePost("baslik");
      

       return  \admin_('ayar',$data,'Site Ayarları');
    }


    function savePost($postname=null,$dbName=null,$site=null,$dil=null)
    {
        $post = $this->request->getPost($postname);
        return $post;
    }



    function upload($filename,$dbName=null,$site=null,$dil = null)
    {
        $ayarDB = new AyarModel();
        helper(['text','inflector']);
        $name = $this->request->getFile($filename);
        
        if (isset($name) && !empty($name->getName())) {
            
              $imageName =  strtolower( \convert_accented_characters(\underscore($name->getName())));
              $uploadStatus=  $name->move(ROOTPATH.'public/uploads/setting',$imageName);
              if($uploadStatus)
              {
                $where = ['anahtar'=>$dbName,'site'=>$site,'dil'=>$dil];
                $row =  $ayarDB->row_count($where);
               
                    $save['anahtar'] = $dbName; 
                    $save['deger'] = $imageName;
                    $save['site'] = $site;
                    $save['dil'] = $dil;
                    $save['tip'] = 'site';
                if(count($row) == 0)
                {
                    $ayarDB->save($save);
                }else{
                    \unlink(ROOTPATH.'public/uploads/setting/'.$row[0]['deger']);
                    $ayarDB->where($where)->update($row[0]['id'],$save);
                }
                
                
              }
        }else{
            return  "null";
        }


    }

    
}

?>