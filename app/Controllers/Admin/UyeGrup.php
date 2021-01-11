<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use \App\Models\LoginModel;
use Config\Services; //session işlemleri için ekle

class UyeGrup extends BaseController
{
    public function __construct()
	{	
		//session tanımla
		$this->session = Services::session();
		
	}
    public function index()
    {
        echo "test";
        return admin_('uye_grup',[],'Üye Grup Ayarları');
    }
}
?>