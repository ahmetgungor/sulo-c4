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
            
            $json = file_get_contents($ayarlar['Genel']['url'][0]['kanalurl']);
            
            $json = json_decode($json,true);
          //  print_r($json);
        ?>

            <table id="dataTable" class="table" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Kanal Adı</th>
               
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            function badge($class,$text)
            {
                return '<div class="'.$class.'">'.$text.'</div>';
            }
                $secilenler =  $pagedb->dataList($tip,$site,$dil);
                $sec=[];
                foreach ($secilenler as $key => $value)
                {
                    $sec[]= $value['ekalan'];
                }
                foreach ($json as $key => $value):
                $icon = '';
                if(array_key_exists('icon',$value))
                {
                    $icon =  $value['icon'];
                }
                $j = json_encode(['id'=>$value['id'],'baslik'=>$value['baslik'],'tarih'=>$value['tarih'],'icon'=>$icon]);
                $url = base64_encode($j);
             $secim = '';
             if(in_array($value['id'],$sec))
             {
                $secim = badge("badge badge-success","Yayınlanmış");
             }   
            ?>
            <tr>
                <td><?=$value['id']?><br><?=$secim?></td>
                <td><?=$value['baslik']?><br><?=$value['tarih']?><br><?
                if(array_key_exists('icon',$value))
                {
                    echo $value['icon'];
                }
                ?></td>
                <td><a href="?site=<?=$site?>&dil=<?=$dil?>&save=<?=$url?>" class="btn btn-success btn-block">Ekle</a></td>
            </tr>
           <?php endforeach;?>
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