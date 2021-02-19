<?php
namespace App\Controllers;
class Services extends BaseController
{


    public function api($site=null,$dil=null)
    {   
        $db = \Config\Database::connect();
        $ayar = $db->query('select anahtar as k,deger as v from ayar where site = ? and dil=?',[$site,$dil])->getResult();
        $data['setting'] = $ayar; 
        $menu  = $db->query('SELECT menuid.baslik as konum,page.id as id,menuid.uid,menuid.sira,page.baslik,page.link,page.tasarim FROM menuid INNER JOIN page on menuid.yazi_id = page.id where menuid.site = ? and menuid.dil=? and yayin=1 order by sira',[$site,$dil])->getResult();
        
      
        
        $m=[];
        foreach ($menu as $key => $value) {
            
            $m[$value->link][]= $value;
            $m[$value->link]['resimler'] =   $db->query("SELECT * FROM resim where yaziid=?",$value->id)->getResult();
        }
        
         $data['menu'] = $m;
         $ayarlar = getSetting_();
        $data['dil'] = keyValue($ayarlar['Genel']['dil']);
        return $this->response->setJSON($data);


      //  $data['ayar']
    }
}

?>