<?php
namespace App\Libraries;
use App\Libraries\JsonGetFace; 


class JsonGet implements JsonGetFace
{
    
   

    function getjson()
    {
       $list = [];
       $json = \file_get_contents("https://matches-getter.herokuapp.com/");
       $json = \json_decode($json); 
       
        foreach ($json->live as $key => $value) {
            if(!empty($value->streamId))
            {
                //$list[$key]['value'] =$value;
                $list[$key]['home'] = $value->homeName;
                $list[$key]['away'] = $value->awayName;
                $list[$key]['home_logo'] = $value->homeLogo;
                $list[$key]['away_logo'] = $value->awayLogo;
                $list[$key]['kategori'] = $value->type;
                $list[$key]['time'] = $value->time;
                $list[$key]['stream_id'] =$this->get_stream_id($value->streamId);
                $list[$key]['m3u8'] = $value->streamId;
            }
        }
        return $list;
       
    }

    function get_stream_id($data)
    {
         \preg_match_all("@_definst_\/(.*)\/(.*).m3u8@si",$data,$return);
         return $return[1][0];
    }



    //bilgileri kayıt edileceği ekran 
    function dataList()
    {
        $liste = $this->getjson();
        
    }
}


?>