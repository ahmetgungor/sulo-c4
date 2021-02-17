<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use \App\Models\LoginModel;
use Config\Services; //session işlemleri için ekle
use \App\Models\PageModel;
use App\Libraries\JsonGet; 
use \App\Models\MenuModel;

class Menu extends BaseController
{
    public function __construct()
    {
       // $this->session = Services::session();
       
    
    }

    function index2()
    {
        $a = new JsonGet();
        print_r($a->getjson());
        //$a->dataList());
    }
    

    function index()
    {
        $menuDb = new MenuModel();
        $data['site'] = $site = $this->request->getGet('site');
        $data['dil'] = $dil = $this->request->getGet('dil');
        $data['konum'] = $konum = $this->request->getGet('konum');
        $data['islem'] = $islem = $this->request->getGet('i');
        //3 Kategoriler
        if(!empty($dil) || !empty($konum))
        {
            $kategoriList= $menuDb->getPageMenu(3,$site,$dil,$konum);
            $data['kategoriList'] = $kategoriList;

            $pageList= $menuDb->getPageMenu(1,$site,$dil,$konum);
            $data['pageList'] = $pageList;
            $test = $menuDb->jsonGetMenu($site,$dil,$konum,0);
            $data['json_menu'] =  \json_encode($test);
        }
       
       
       return admin_('menu',$data,'Menu İşlemleri');
    }

    function indexPOST(){
        $data['islem'] = $islem = $this->request->getGet('i');
        $data['konum'] = $konum = $this->request->getGet('konum');
        $data['site'] = $site = $this->request->getGet('site');
        $data['dil'] = $dil = $this->request->getGet('dil');
        $menuDb = new MenuModel();
        if($islem == 'aktar')
        {
            $sayfalar = $this->request->getPost('sayfalar');
            foreach ($menuDb->getIdPageList($sayfalar) as $key => $value)
            {
                $save['baslik']     = $konum;
                $save['site']       = $site;
                $save['dil']        = $dil;
                $save['yazi_id']    = $value['id'];
                $save['kategori']   = ($value['tip']== 3)?1:0;
                $save['uid']        = 0;
                $menuDb->save($save);
            }
        }

        return redirect()->to(base_url('admin/menu/index?site='.$site.'&dil='.$dil.'&konum='.$konum))->with('success',
			'Menuler Başarılı Bir Şekilde Eklendi');
    }

    /**
     * Menu Konumunu Güncellemek için
     */
    function indexupdate()
    {
        $menuDb = new MenuModel();
        $json = $this->request->getPost('json');
        $i = 0;
        foreach (\json_decode($json,true) as $key => $value) {
            $j = 0;
            
            if(isset($value['children']))
            {
              $this->arrayEach($value['children'],$value['yaziid']);   
            }else{
                $save['uid'] = 0;
            }
            $save['sira'] = $i;
            
            $menuDb->update($value['menuid'],$save);
            $i++;
            \print_r($value);
        }
        
        //print_r($json);
    }

    
    function arrayEach($array,$ust_id=null)
    {
        $menuDb = new MenuModel();
        $j = 0;
        foreach($array as $key=>$val)
        {
            
            $save['uid'] = $ust_id;
            $save['sira'] = $j;
            $menuDb->update($val['menuid'],$save);
            $j++;

            if(isset($val['children']))
            {
              $this->arrayEach($val['children'],$val['yaziid']);   
            }
        }
    }


    function sil()
    {
        $data['islem'] = $islem = $this->request->getGet('i');
        $data['konum'] = $konum = $this->request->getGet('konum');
        $data['site'] = $site = $this->request->getGet('site');
        $data['dil'] = $dil = $this->request->getGet('dil');
        $data['id'] = $id = $this->request->getGet('silid');
        $menuDb = new MenuModel();
        $row = $menuDb->query('SELECT * FROM menuid where id=?',[$id])->getRow();
        
        
        
        $altMenuVarmi =  $menuDb->where("site",$site)->where("dil",$dil)->where("baslik",$konum)->where("uid",$row->yazi_id)->countAllResults();
        if($altMenuVarmi == 0)
        {
            $menuDb->delete($id);
            return redirect()->to(base_url('admin/menu/index?site='.$site.'&dil='.$dil.'&konum='.$konum))->with('success',
			'Menu Silime İşlemi Başarılı ');
        }else{
            return redirect()->back()->withInput()->with('error', "Bu Menü Altında Bir Başka Menü Olduğu için Silinemiyor.");
        }
    }

    function dataPOST()
    {
        print_r($_POST);
    }
}
?>