<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\ResimModel;
use Config\Services; //session işlemleri için ekle
use CodeIgniter\API\ResponseTrait;
class Resim extends BaseController
{
    use ResponseTrait;
    public function __construct()
	{	
		//session tanımla
		$this->session = Services::session();
		
	}
    public function index($id = null)
    {
      $data['id'] = $id;
       return view('Admin/resim',$data);
    }


    function fileUpload(int $id=null)
    {
        $resim = new ResimModel();
        helper(['text','inflector']);
        $img = $this->request->getFile('file');
        $name = strtolower(\convert_accented_characters(\underscore($img->getName())));
        $i=  $img->move(ROOTPATH.'public/uploads',$name);
        
        if($i)
        {
            $data['resim'] = $img->getName();
            if(!empty($id))
            {
                $data['yaziid'] = $id;
            }
            
            $resim->save($data);
        }
        
         
        
         echo json_encode($i);
    }

    function jsonlist($id = null)
    {
        
        $resim = new ResimModel();
        $a =  $resim->where("yaziid",$id)->findAll();
        return $this->response->setJSON($a);
    }
    
    function delete()
    {
        $resim =new ResimModel();
        $id = $this->request->getPost('id');
        $row = $resim->find($id);
        \unlink(FCPATH."uploads/".$row['resim']);
        $resim->delete($id);
    }

    function updateResim()
    {
        $resim = new ResimModel();
        $data_list = $this->request->getPost('data');
        $selectImage = $data_list['selectImg'];
        $data_list = array_diff_key($data_list,['selectImg'=>'']);
        \print_r($selectImage);
        print_r($data_list);
       
        foreach($data_list  as $key=>$val)
        {
           $c = [];
            
           if(isset($selectImage))
           {
               if($selectImage == $key)
               {
                    $c['onecikan'] = 1;
               }else{
                    $c['onecikan'] = 0;
               }

           }else{
            $c['onecikan'] = 0;
           }
               
                $c['slide_adi'] = $val['title'];
                $c['link'] = $val['link'];
                $c['aciklama'] = $val['aciklama'];
                $resim->update($key,$c);
           
            echo $resim->getLastQuery();
            
            \print_r($c);
        }
       /* 
        $resim = new ResimModel();
        $key_id = implode(',',array_keys($data_list));
        $resim->update([$key_id],$c); 
       */
        
    }
}
?>