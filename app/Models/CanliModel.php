<?php
namespace App\Models;

use CodeIgniter\Model;

class CanliModel extends Model
{
    protected $table      = 'canli';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'home','away','home_logo','away_logo','time','stream_id','baslik','link','aciklama','kategori'
    ];

// protected $useTimestamps = false;
 //   protected $createdField  = 'created_at';
 //   protected $updatedField  = 'updated_at';
//    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
?>