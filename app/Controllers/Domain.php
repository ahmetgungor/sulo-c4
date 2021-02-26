<?php
namespace App\Controllers;
class Domain extends BaseController
{
	public function index()
	{
        $this->request->getGet('domain');
        $status = $this->request->getGet("status");
        if($status == "tvv"):

        $domain['Genel']['dil'] = array(
            [""=>"Lütfen Dil Seçin"],
            ["1"=>"TR"],
            ["2"=>"ENG"]
        );
        $domain['Genel']['tasarim'] = array(
            ['AnaSayfa'=>"Ana Sayfa"],
            ["page"=>"İç Sayfa"],
            ["galeri"=>"Galeri"],
            ["Link"=>"Link"]
        );
        $domain['Genel']['konum'] = array(
            [""=>"Lütfen Menü Seçin"],
            ["AnaMenu"=>"Ana Menu"],
            ["Footer"=>"Footer Menu"],
            ["KanalListesi"=>"Kanal Listesi"]
        );
        $domain['Genel']['site'] = array(
            [""=>"Lütfen Site Seçin"],
            ["tbcof.com"=>"tbcof.com"]
        );
        
            return $this->response->setJSON($domain);
        endif;

        if($status=='lg')
        {
            return $tihs->response->setJSON(['status'=>"true"]);
        }
	}

    function test()
    {
        echo $_SERVER['SERVER_NAME'];
    }

	//--------------------------------------------------------------------?domain=tbcof.com&status=1

}

?>