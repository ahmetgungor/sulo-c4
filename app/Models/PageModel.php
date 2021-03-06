<?php
namespace App\Models;

use CodeIgniter\Model;

class PageModel extends Model
{
    protected $table      = 'page';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'dil','id','site','g_title','g_keyw',
        'g_desc','baslik','link','aciklama',
        'y_tarihi','g_tarihi','yayin','tasarim','tip','ustmenu','ekalan'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'y_tarihi';
    protected $updatedField  = 'g_tarihi';
    

    protected $validationRules    = []; 
    protected $validationMessages = []; 
    protected $skipValidation     = false;


    public function dataList($tip=null,$site=null,$dil=null)
    {
        $where = ["tip"=>$tip,"site"=>$site,'dil'=>$dil];
        return PageModel::where($where)->findAll();
        
        
        
    }



}

?>