<?php
namespace App\Controllers;
class Domain extends BaseController
{
	public function index()
	{
       // print_r(getSetting_());
            echo  "https://user4.herokuapp.com/?domain=".$_SERVER['SERVER_NAME']."&status=tvv";
	}

    function test()
    {
        echo $_SERVER['SERVER_NAME'];
    }

	//--------------------------------------------------------------------?domain=tbcof.com&status=1

}

?>