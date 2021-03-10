<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session =	\Config\Services::session();
		$status = $session->get('status');	
        if($status || !empty($status))
        {
            
           // return redirect()->to('/login?Ayar');
        }else{
            return redirect()->to(base_url('/login'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
       
        /*$session =	\Config\Services::session();
		$status = $session->get('status');	
        if($status || !empty($status))
        {
            
           // return redirect()->to('/login?Ayar');
        }else{
            return redirect()->to(base_url('/login'));
        }*/

            
    }
}
?>