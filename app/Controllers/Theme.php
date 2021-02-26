<?php
namespace App\Controllers;
class theme extends BaseController
{



    function index1($url=null,$url2=null)
    {
        $agent = $this->request->getUserAgent();
        if ($agent->isMobile())
        {
            return $this->mobile1($url,$url2);
        }else{
            return $this->web1($url,$url2);
        }
        
    }

    function web1($url=null,$url2=null)
    {
        $data = [];
        $data['header'] =  view('theme/header',$data);
        $data['body']   =  view('theme/body',$data);
        $data['footer']   =  view('theme/footer',$data);
        return view('theme/theme',$data);
    }

    function mobile1($url=null,$url2=null)
    {
        $data = [];
        $data['header'] =  view('mobile/header',$data);
        $data['body']   =  view('mobile/body',$data);
        $data['footer']   =  view('mobile/footer',$data);
        return view('mobile/theme',$data);
    }
}
?>