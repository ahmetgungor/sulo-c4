<?php
namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    

    protected $allowedFields = [
        'kadi','isimsoyisim','sifre','email',
        'gsm','dogumtarihi','aciklama','ktarihi','gtarihi',
        'gkodu','aktif','tc'
    ];

    

    protected $useTimestamps = true;
    protected $createdField  = 'ktarihi';
    protected $updatedField  = 'gtarihi';
    //protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


    function login($email,$parola)
    {

        return $this->db->query('SELECT *,count(id) as toplam FROM user where (kadi=? or email =?) and sifre=?',[$email,$email,($parola)])->getRow();
    }

}
?>