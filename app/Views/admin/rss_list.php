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
             
            $s =[];
                foreach ($list as $key => $value):
                    
                $s=base64_encode(json_encode([
                    'baslik'=>$value['baslik'],
                    'aciklama'=>$value['aciklama'],
                    'resim'=>$value['resim']
                    ]));

            ?>
            <tr>
                <td><?=$value['baslik']?></td>
                <td><?=$value['aciklama']?><br><?=$value['resim']?><br></td>
                <td><a href="?site=<?=$site?>&dil=<?=$dil?>&url=<?=$url?>&save=<?=$s?>" class="btn btn-success btn-block">Ekle</a></td>
            </tr>
           <?php endforeach; /**/ ?>
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