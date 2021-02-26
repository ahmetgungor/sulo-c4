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
        
        function input_($label="null",$name=null,array $attr=[])
        {
            $s ='';
            foreach ($attr as $key => $value) {
                $s.=$key.'="'.$value.'"';
            }
            return '<div class="form-group">
            <label>'.$label.'</label>
            <input type="text" name="'.$name.'" class="form-control"  '.$s.'>
        </div>';
        }

        function select_($label=null,$name=null,array $data=[], $select=null)
        {
            $s[] = '<div class="form-group">
            <label>'.$label.'</label>
              <select class="form-control" name="'.$name.'">';
              foreach ($data as $key => $value) {
                  $f = ($select==$key)?'selected':'';
                  $s[] ='<option value="'.$key.'" '.$f.'>'.$value.'</option>';
                //$s[] = array_values($value);
            }
              $s[] ='</select></div>';
              return  implode(' ',$s);
        }

        // function getSetting_(){
        //     $json =  file_get_contents(base_url('setting.json'));
        //     return json_decode($json,true);
        // }
        function getSetting_(){
            //base_url('tema.json')
            $json =  file_get_contents("https://user4.herokuapp.com/?domain=".$_SERVER['SERVER_NAME']."&status=tvv");
            return json_decode($json,true);
        }

        function keyValue(array $data=[])
        {
            $return = [];
            
            foreach($data as $key=>$value)
            {
                foreach($value as $k=>$v)
                {
                    $return[$k]= $v;
                }
            }
            return $return;
        }


  
?>