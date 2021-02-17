<?php 
namespace App\Models;

use CodeIgniter\Model;

class ResimModel extends Model
{
    protected $table      = 'resim';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id','resim','yaziid','aciklama','sira','onecikan','slide','slide_adi','link','kayit_tarihi'
    ];

    protected $useTimestamps = false;
    protected $createdField  = 'kayit_tarihi';
   

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}

?>