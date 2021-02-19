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
        $data['sil'] = $sil = $this->request->getGet("sil");
        $data['ayardb'] = $ayarDB = new AyarModel();
        if(!empty($sil))
        {
            $a = $ayarDB->where(['anahtar'=>$sil])->delete();
            if($a)
            {
                return  redirect()->to(base_url("admin/ayar/index?promo=".$promo."&site=".$site."&dil=".$dil))->with('success',"Silme İşlemi Başarılı");
            }
            
        }

        //pdata[site][img][arkaplan]
        
       
       
        $this->upload("arkaplan",'arkaplan',$site,$dil);
        $this->upload("logo",'logo',$site,$dil);
        
        $this->upload("reklam1",'reklam1',$site,$dil);
        $this->upload("reklam2",'reklam2',$site,$dil);
        $this->upload("reklam3",'reklam3',$site,$dil);

        $this->savePost("baslik","baslik",$site,$dil);
        $this->savePost("description","description",$site,$dil);

        $this->savePost("reklam1url","reklam1url",$site,$dil);
        $this->savePost("reklam2url","reklam2url",$site,$dil);
        $this->savePost("reklam3url","reklam3url",$site,$dil);

        $this->savePost("css","css",$site,$dil);
        $this->savePost("js","js",$site,$dil);
       
        return  \admin_('ayar',$data,'Site Ayarları');
    }


    function savePost($postname=null,$dbName=null,$site=null,$dil=null)
    {
        $post = $this->request->getPost($postname);
        $ayarDB = new AyarModel();
        if(!empty($post))
        {
            $where = ['anahtar'=>$dbName,'site'=>$site,'dil'=>$dil];
            $row =  $ayarDB->row_count($where);
                    $save['anahtar'] = $dbName; 
                    $save['deger'] = $post;
                    $save['site'] = $site;
                    $save['dil'] = $dil;
                    $save['tip'] = 'site';
            if(\count($row)==0)
            {
                $ayarDB->save($save);                 
            }else{

                $ayarDB->where($where)->update($row[0]['id'],$save);
            }
        }else{
            echo "";
        }

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