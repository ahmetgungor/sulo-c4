<?
namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table      = 'menuid';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id','baslik','site','dil','yazi_id','kategori_id',
        'uid','sira'
    ];

    protected $useTimestamps = false;
    

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


    function getPageMenu($page_kat,$site,$dil,$menualani)
    {
        $ontheMenu = $this->onTheMenu($menualani,$site,$dil);
        $where = '';
        if(!empty($ontheMenu))
        {
            $where = " and id not in(".$ontheMenu.")";
        }
        return $this->db->query("select * from page  where yayin =1 and tip = ? and site=? and dil=? ".$where." ",[$page_kat,$site,$dil])->getResultArray();
    }

    // Menüde Olanlar
    function onTheMenu($menualani,$site,$dil)
    {
        $row =  $this->db->query("SELECT GROUP_CONCAT(yazi_id,'') as yazi_id FROM menuid where menuid.baslik = ? and menuid.site=? and menuid.dil=?
        ",[$menualani,$site,$dil])->getRow();
        return $row->yazi_id;    
}



    function getIdPageList($array)
    {
        $idler = implode(",",$array);
        return $this->db->query("select * from page where id in (".$idler.") ")->getResultArray();
    }

    function jsonGetMenu($site=null,$dil=null,$konum=null,$uid=null)
    {
        
        $json = $this->db->query('SELECT menuid.id,
        menuid.uid,
        page.baslik,
        page.tip,
        menuid.yazi_id,
        (select count(uid) from menuid where menuid.baslik ="'.$konum.'" and  uid=page.id) as altkategori_sayisi
         FROM menuid inner join page  on menuid.yazi_id = page.id where menuid.baslik = ? and menuid.site=? and menuid.dil=? and menuid.uid=? order by sira asc',[$konum,$site,$dil,$uid])->getResultArray();
        $newArray = [];
        foreach ($json as $key => $value)
        {
           $newArray[$key]['text'] = $this->menu_adi_duzenle($value['baslik']);
           $newArray[$key]['icon'] = '';
           $newArray[$key]['href'] =(base_url("admin/yazi/index/".$value['tip']."/1?id=".$value['yazi_id']));
           $newArray[$key]['title'] = $this->menu_adi_duzenle($value['baslik']);
           $newArray[$key]['yaziid'] = $value['yazi_id'];
           $newArray[$key]['menuid'] = $value['id'];
           $newArray[$key]['sil_url'] =base64_encode(base_url("admin/menu/sil/?site=".$site."&dil=".$dil."&konum=".$konum."&silid=".$value['id']));
           if($value['altkategori_sayisi'] > 0)
           {
               $newArray[$key]['children'] = $this->jsonGetMenu($site,$dil,$konum,$value['yazi_id']);
           }  
        }
        return $newArray;
    }

    function menu_adi_duzenle($data)
    {
        return str_replace(['&'],['-'],$data);
    }
}
?>