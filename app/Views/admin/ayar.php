<?php
 $db = $ayardb->where(["site"=>$site,'dil'=>$dil])->findAll();
$ad = [];
foreach ($db as $key => $value) {
    $ad[$value['anahtar']] =$value['deger'];
}

print_r($ad);
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
            <form action="" method="get"  class="form">
                    <div class="row">
                        <div class="col-lg-3">
                        <input type="hidden" name="promo" value="<?=$promo?>">
                        <?php
                        $ayarlar = getSetting_();
                        echo select_("Ayar İçin Site Seçin","site",keyValue($ayarlar['Genel']['site']),$site)?>
                        </div>
                        <div class="col-lg-3">
                        <?=select_("Menu İçin Dil Seçin","dil",keyValue($ayarlar['Genel']['dil']),$dil)?>
                        </div>
                        <div class="col-lg-3">
                            <input type="submit" value="Menu Göster" class="btn btn-warning btn-block btn-block btn-large">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data"  class="form">
                    <div class="row">
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                               <label class="" for="customFile">Logo Seçin</label>
                                <input type="file" name="logo" class="form-control" id="customFile">
                                <?php
                                   
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?=input_("Site Başlığı","baslik")?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            
                            <div class="form-group">
                                <label class="" for="customFile">Arka Plan Seçin</label>
                                <input type="file" name="arkaplan" class="form-control" id="customFile">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="pdata[site][description]" id="" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

<hr>
<?php
if($promo == "true"):
?>
                    <div class="row">
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                                <label class="" for="customFile1">Reklam 1</label>
                                <input type="file" name="reklam1" class="form-control" id="customFile1">
                                
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?=input_("Reklam 1 Url","pdata[site][reklam1url]")?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                                <label class="" for="customFile2">Reklam 2</label>
                                <input type="file" name="reklam2" class="form-control" id="customFile2">
                               
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?=input_("Reklam 2 Url","pdata[site][reklam2url]")?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                                <label class="" for="customFile3">Reklam 3</label>
                                <input type="file" name="reklam3" class="form-control" id="customFile3">
                                
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?=input_("Reklam 3 Url","pdata[site][reklam3url]")?>
                        </div>
                    </div>
                    <hr>
<?php 
endif;
?>
                 

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Css</label>
                                <textarea name="pdata[site][css]"  style="height:250px"  class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Js</label>
                                <textarea name="pdata[site][js]"  style="height:250px"  class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <input type="submit" value="Ayarları Kayıt Et" class="btn btn-success btn-large pull-right">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
