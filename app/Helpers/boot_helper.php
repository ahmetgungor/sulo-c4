<?php

    
        function admin_($theme=null,$data=null,$title=null)
        {
            $data['title'] = $title;
            $data['header'] = view('admin/sabit/header',$data);
            $data['leftmenu'] = view('admin/sabit/leftmenu',$data);
            $data['footer'] = view('admin/sabit/footer',$data);
            $data['content'] = view('admin/'.$theme,$data);
            return  view('admin/content',$data);
            
        }
    
/**/
?>