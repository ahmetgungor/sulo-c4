<?php
namespace App\Models;

use CodeIgniter\Model;

class AyarModel extends Model
{
    protected $table      = 'ayar';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id','site','dil','tip','anahtar','deger'
    ];

    protected $useTimestamps = false;
    //protected createdField  = 'created_at';
    //protected updatedField  = 'updated_at';
    //protected deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


    public function row_count($where)
    {
        return AyarModel::where($where)->findAll();
    }

    public function row($where)
    {
        return AyarModel::where($where)->first();
    }

}
?>