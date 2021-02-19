<div class="row">
    <div class="col-lg-12">
        <?=view('App\Views\admin\sabit\_notification') ?>
    </div>
</div>
<div class="row">
<div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <form action="" method="get"  class="form">
                    <div class="row">
                        <div class="col-lg-12">
                        <?php
                        $ayarlar = getSetting_();
                       
                        
                        echo select_("Menu İçin Site Seçin","site",keyValue($ayarlar['Genel']['site']),$site)?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <?=select_("Menu İçin Dil Seçin","dil",keyValue($ayarlar['Genel']['dil']),$dil)?>
                        </div>
                    </div>  
                    <div class="row">  
                        <div class="col-lg-12"><label for="">&nbsp;</label>
                            <input type="submit" value="Menu Göster" class="btn btn-warning btn-block btn-block btn-large">
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div>
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
        <?php
            if(!empty($site) && !empty($dil) && !empty($tip)):
        ?>

            <table id="dataTable" class="table" style="width:100%">
        <thead>
            <tr>
                <th>Başlık</th>
                <th>Tasarım</th>
                <th>Yayin Durumu</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php
            function badge($class,$text)
            {
                return '<div class="'.$class.'">'.$text.'</div>';
            }
                $t = keyValue($ayarlar['Genel']['tasarim']);
                foreach ($pagedb->dataList($tip,$site,$dil) as $key => $value):
            ?>
            <tr>
                <td><?=$value['baslik']?></td>
                <td><?=$t[$value['tasarim']]?></td>
                <td>
                    <?php
                        if($value['yayin']== 0)
                        {
                            echo badge("badge badge-danger","Yayınlanmamış");
                        }else{
                            echo badge("badge badge-success","Yayında");
                        }
                    ?>
                </td>
                <td>
                    <div class="btn-group mb-3">
                      
                      <a  class="btn btn-success"  href="<?=base_url("admin/yazi/index/".$tip."/1?id=".$value['id'])?>" >Düzenle</a>
                      <a  class="btn btn-danger" onclick="return confirm(' Silmek İstediğinize Emin misiniz ?')" href="<?=base_url('admin/yazi/delete?tip='.$tip.'&site='.$site.'&dil='.$dil.'&id='.$value['id'])?>">Sil</a>
                    </div>    
                </td>
            </tr>
          
            <?php
            endforeach;
            ?>
        </tbody>
        
    </table>
    <?php
    else:
        ?>
        <div class="alert alert-danger">
            <strong>Uyarı !</strong> Lütfen Site ve Dil Seçimi Yapın
        </div>

        <?php
        endif;
    ?>
            </div>
        </div>
    </div>
</div>