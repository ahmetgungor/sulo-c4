<?php
namespace App\Controllers;
class Services extends BaseController
{


    public function api($site=null,$dil=null)
    {   
        $db = \Config\Database::connect();
        $ayar = $db->query('select anahtar as k,deger as v from ayar where site = ? and dil=?',[$site,$dil])->getResult();
        $data['setting'] = $ayar; 
        $menu  = $db->query('SELECT page.tasarim,menuid.baslik as konum,page.id as id,menuid.uid,menuid.sira,page.baslik,page.link,page.tasarim FROM menuid INNER JOIN page on menuid.yazi_id = page.id where menuid.site = ? and menuid.dil=? and yayin=1 order by sira',[$site,$dil])->getResult();
        
      
        
        $m=[];
        $i=0;
        foreach ($menu as $key => $value) {
            
            $m[$value->konum][$value->link][]= $value;
            $m[$value->konum][$value->link]['resimler'][] =   $db->query("SELECT * FROM resim where yaziid=?",$value->id)->getResult();
        }
        
         $data['menu'] = $m;
         $ayarlar = getSetting_();
        $data['dil'] = keyValue($ayarlar['Genel']['dil']);
        return $this->response->setJSON($data);


      //  $data['ayar']
    }


    function setting($site=null,$dil=null)
    {
        $db = \Config\Database::connect();
        $ayar = $db->query('select anahtar as k,deger as v from ayar where site = ? and dil=?',[$site,$dil])->getResult();
        $m = [];
        foreach ($ayar as $key => $value) {
          $m[$value->k]=$value->v;  
        }

        $menu1  = $db->query('SELECT page.tasarim,menuid.baslik as konum,page.id as id,menuid.uid,menuid.sira,page.baslik,page.link,page.tasarim,page.ekalan FROM menuid INNER JOIN page on menuid.yazi_id = page.id where menuid.site = ? and menuid.dil=? and yayin=1 order by sira',[$site,$dil])->getResult();
        $i=0;
        foreach ($menu1 as $key => $value)
        {
             
            $m[$value->konum][$i]= $value;
//    $m[$value->konum][$i]['resimler'] =   $db->query("SELECT * FROM resim where yaziid=?",[$value->id])->getResult();
        $i++;
        }

        return $this->response->setJSON($m);
    }



    function page($site=null,$dil=null)
    {
        $db = \Config\Database::connect();
        $result = $db->query('select * from page where site=? and dil=? and tip=7 limit 6',[$site,$dil])->getResult();
        $data =[];
        foreach ($result as $key => $value)
        {
            $data[$key] = $value;
            //$data[$key]['resim'] =  $db->query("SELECT * FROM resim where yaziid=?",[$value->id])->getResult();
        }
        return $data;
    }


    function kanal_listesi($site=null,$dil=null)
    {
        $db = \Config\Database::connect();
        $menu  = $db->query('SELECT page.tasarim,page.ekalan,menuid.baslik as konum,page.id as id,menuid.uid,menuid.sira,page.baslik,page.link,page.tasarim FROM menuid INNER JOIN page on menuid.yazi_id = page.id where menuid.site = ? and menuid.dil=? and menuid.baslik = "KanalListesi" and yayin=1 order by sira',[$site,$dil])->getResult();


        $ayar = $db->query('select anahtar as k,deger as v from ayar where site = ? and dil=?',[$site,$dil])->getResult();
        $m = [];
        foreach ($ayar as $key => $value) {
          $m[$value->k]=$value->v;  
        }
      
        
        foreach ($menu as $key => $value) {
            $resim = $db->query("SELECT resim FROM resim where yaziid=? and onecikan=1",$value->id);
            $is_image =false;
            if($resim->getFieldCount() != 0)
            {
            $is_image = true;
            }
            $resim = $resim->getResult();
            

            $m['channels'][$key]['name']= $value->baslik;
            $m['channels'][$key]['stream']= $value->ekalan;
            if($is_image)
            {
                $m['channels'][$key]['logo'] =base_url('uploads/'.$resim[0]->resim);
            }else{
                $m['channels'][$key]['logo'] ='';
            }
            
        }
        
        $menu1  = $db->query('SELECT page.tasarim,page.ekalan,menuid.baslik as konum,page.id as id,menuid.uid,menuid.sira,page.baslik,page.link,page.tasarim FROM menuid INNER JOIN page on menuid.yazi_id = page.id where menuid.site = ? and menuid.dil=? and menuid.baslik != "KanalListesi" and yayin=1 order by sira asc',[$site,$dil])->getResult();
        foreach ($menu1 as $key => $value)
        {
            $m['menu'][$value->link][]= $value;
            $m['menu'][$value->link]['resim']= $db->query("SELECT * FROM resim where yaziid=? ",$value->id)->getResult();
        }
        $m['liveScores'] =[]; //$this->bet1xbet();
        $m['haberler'] = $this->page($site,$dil);
        return $this->response->setJSON($m);
    }

    function bet1xbet()
    {
        $url = 'https://bet1-x58326.com/LiveFeed/Get1x2_VZip?sports=1&count=50&lng=tr&mode=4&country=1&partner=7&getEmpty=true&noFilterBlockEvent=true';
        $data =  file_get_contents($url);
        return $this->score_data($data);
    }

    function score_data($data)
    {
        $json = \json_decode($data,true);
        $c= [];
        foreach ($json['Value'] as $key => $value) {
            $ss = array_key_exists('S1',$value['SC']["FS"])?$value['SC']["FS"]['S1']:0;
            $sst =  \array_key_exists('S2',$value['SC']['FS'])?$value['SC']["FS"]['S2']:0;
            $c[$key]['teams'] = $value["O1"]."-(".$ss."-".$sst.")-".$value["O2"];
            $c[$key]['category'] = $value['SE'];
            $c[$key]['type'] = $value['L'];
            $c[$key]['status'] = $value['SC']['CPS'];
            
            
        }
        return $c;


    }
}

?>