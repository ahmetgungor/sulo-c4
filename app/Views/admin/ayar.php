<?php
 $db = $ayardb->where(["site"=>$site,'dil'=>$dil])->findAll();
$ad = [];
foreach ($db as $key => $value) {
    $ad[$value['anahtar']] =$value['deger'];
}


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
<div class="row mt-1 mb-1">
<div class="col-lg-12">
<?= view('App\Views\admin\sabit\_notification') ?>
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
                                if(array_key_exists('logo',$ad))
                                {
                                ?>
                                    <a href="<?=base_url("/uploads/setting/".$ad['logo'])?>" target="_blank" style="font-size:18px; margin-top:10px">
                                    <i class="fas fa-images" style="font-size:18px"></i>
                                    Yüklenen Resmi Görüntüle
                                    </a>
                                    <a href="<?=base_url("admin/ayar/index?promo=".$promo."&site=".$site."&dil=".$dil."&sil=logo")?>" onclick="return confirm('Silmek İstediğinize Eminmisiniz')" style="color:red; margin-left:20px;" ><i class="fas fa-trash"></i> Sil</a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                         <div class="form-group">
                            <label>Site Başlığı</label>
                            <?php
                            $vdata = (array_key_exists('baslik',$ad))?$ad['baslik']:'';
                            if(array_key_exists('baslik',$ad))
                            {
                            ?>
                                <a href="<?=base_url("admin/ayar/index?promo=".$promo."&site=".$site."&dil=".$dil."&sil=baslik")?>" onclick="return confirm('Silmek İstediğinize Eminmisiniz')" style="color:red; margin-left:20px;" class="mb-1" ><i class="fas fa-trash"></i> Sil</a>
                            <?php
                            }
                            ?>
                            <input type="text" name="baslik" class="form-control" value="<?=$vdata?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            
                            <div class="form-group">
                                <label class="" for="customFile">Arka Plan Seçin</label>
                                <input type="file" name="arkaplan" class="form-control" id="customFile">
                                <?php
                                if(array_key_exists('arkaplan',$ad))
                                {
                                ?>
                                    <a href="<?=base_url("/uploads/setting/".$ad['arkaplan'])?>" target="_blank" style="font-size:18px; margin-top:10px">
                                    <i class="fas fa-images" style="font-size:18px"></i>
                                    Yüklenen Resmi Görüntüle
                                    </a>
                                    <a href="<?=base_url("admin/ayar/index?promo=".$promo."&site=".$site."&dil=".$dil."&sil=arkaplan")?>" onclick="return confirm('Silmek İstediğinize Eminmisiniz')" style="color:red; margin-left:20px;" ><i class="fas fa-trash"></i> Sil</a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Description</label>
                                <?php
                                $vdata = (array_key_exists('description',$ad))?$ad['baslik']:'';
                                
                                if(array_key_exists('description',$ad))
                                {
                                ?>
                                <a href="<?=base_url("admin/ayar/index?promo=".$promo."&site=".$site."&dil=".$dil."&sil=description")?>" onclick="return confirm('Silmek İstediğinize Eminmisiniz')" style="color:red; margin-left:20px;" class="mb-1" ><i class="fas fa-trash"></i> Sil</a>
                            <?php
                            }
                            ?>
                            <textarea name="description" id="" class="form-control"><?=$vdata?></textarea>
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
                                <?php
                                if(array_key_exists('reklam1',$ad))
                                {
                                ?>
                                    <a href="<?=base_url("/uploads/setting/".$ad['reklam1'])?>" target="_blank" style="font-size:18px; margin-top:10px">
                                    <i class="fas fa-images" style="font-size:18px"></i>
                                    Yüklenen Resmi Görüntüle
                                    </a>
                                    <a href="<?=base_url("admin/ayar/index?promo=".$promo."&site=".$site."&dil=".$dil."&sil=reklam1")?>" onclick="return confirm('Silmek İstediğinize Eminmisiniz')" style="color:red; margin-left:20px;" ><i class="fas fa-trash"></i> Sil</a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-6">

                            <div class="form-group">
                            <label>Reklam 1 Url</label>
                            <?php
                            $vdata = (array_key_exists('reklam1url',$ad))?$ad['reklam1url']:'';
                            if(array_key_exists('reklam1url',$ad))
                            {
                            ?>
                                <a href="<?=base_url("admin/ayar/index?promo=".$promo."&site=".$site."&dil=".$dil."&sil=reklam1url")?>" onclick="return confirm('Silmek İstediğinize Eminmisiniz')" style="color:red; margin-left:20px;" class="mb-1" ><i class="fas fa-trash"></i> Sil</a>
                            <?php
                            }
                            ?>
                            <input type="text" name="reklam1url" class="form-control" value="<?=$vdata?>">
                            </div>
                        </div>
                            
                        
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                                <label class="" for="customFile2">Reklam 2</label>
                                <input type="file" name="reklam2" class="form-control" id="customFile2">
                                <?php
                                if(array_key_exists('reklam2',$ad))
                                {
                                ?>
                                    <a href="<?=base_url("/uploads/setting/".$ad['reklam2'])?>" target="_blank" style="font-size:18px; margin-top:10px">
                                    <i class="fas fa-images" style="font-size:18px"></i>
                                    Yüklenen Resmi Görüntüle
                                    </a>
                                    <a href="<?=base_url("admin/ayar/index?promo=".$promo."&site=".$site."&dil=".$dil."&sil=reklam2")?>" onclick="return confirm('Silmek İstediğinize Eminmisiniz')" style="color:red; margin-left:20px;" ><i class="fas fa-trash"></i> Sil</a>
                                <?php
                                }
                                ?>
                               
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label>Reklam 2 Url</label>
                            <?php
                            $vdata = (array_key_exists('reklam2url',$ad))?$ad['reklam2url']:'';
                            if(array_key_exists('reklam2url',$ad))
                            {
                            ?>
                                <a href="<?=base_url("admin/ayar/index?promo=".$promo."&site=".$site."&dil=".$dil."&sil=reklam2url")?>" onclick="return confirm('Silmek İstediğinize Eminmisiniz')" style="color:red; margin-left:20px;" class="mb-1" ><i class="fas fa-trash"></i> Sil</a>
                            <?php
                            }
                            ?>
                            <input type="text" name="reklam2url" class="form-control" value="<?=$vdata?>">
                            </div>
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                                <label class="" for="customFile3">Reklam 3</label>
                                <input type="file" name="reklam3" class="form-control" id="customFile3">
                                <?php
                                if(array_key_exists('reklam3',$ad))
                                {
                                ?>
                                    <a href="<?=base_url("/uploads/setting/".$ad['reklam3'])?>" target="_blank" style="font-size:18px; margin-top:10px">
                                    <i class="fas fa-images" style="font-size:18px"></i>
                                    Yüklenen Resmi Görüntüle
                                    </a>
                                    <a href="<?=base_url("admin/ayar/index?promo=".$promo."&site=".$site."&dil=".$dil."&sil=reklam3")?>" onclick="return confirm('Silmek İstediğinize Eminmisiniz')" style="color:red; margin-left:20px;" ><i class="fas fa-trash"></i> Sil</a>
                                <?php
                                }
                                ?>
                               
                            </div>
                        </div>
                        <div class="col-lg-6">
                            
                            <div class="form-group">
                            <label>Reklam 3 Url</label>
                            <?php
                            $vdata = (array_key_exists('reklam3url',$ad))?$ad['reklam3url']:'';
                            if(array_key_exists('reklam3url',$ad))
                            {
                            ?>
                                <a href="<?=base_url("admin/ayar/index?promo=".$promo."&site=".$site."&dil=".$dil."&sil=reklam3url")?>" onclick="return confirm('Silmek İstediğinize Eminmisiniz')" style="color:red; margin-left:20px;" class="mb-1" ><i class="fas fa-trash"></i> Sil</a>
                            <?php
                            }
                            ?>
                            <input type="text" name="reklam3url" class="form-control" value="<?=$vdata?>">
                            </div>

                        </div>
                    </div>
                    <hr>
<?php 
endif;
?>
                 

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Css</label><?php
                            $vdata = (array_key_exists('css',$ad))?$ad['css']:'';
                            if(array_key_exists('css',$ad))
                            {
                            ?>
                                <a href="<?=base_url("admin/ayar/index?promo=".$promo."&site=".$site."&dil=".$dil."&sil=css")?>" onclick="return confirm('Silmek İstediğinize Eminmisiniz')" style="color:red; margin-left:20px;" class="mb-1" ><i class="fas fa-trash"></i> Sil</a>
                            <?php
                            }
                            ?>
                                <textarea name="css"  style="height:250px"  class="form-control"><?=$vdata?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Js</label><?php
                            $vdata = (array_key_exists('js',$ad))?$ad['js']:'';
                            if(array_key_exists('js',$ad))
                            {
                            ?>
                                <a href="<?=base_url("admin/ayar/index?promo=".$promo."&site=".$site."&dil=".$dil."&sil=js")?>" onclick="return confirm('Silmek İstediğinize Eminmisiniz')" style="color:red; margin-left:20px;" class="mb-1" ><i class="fas fa-trash"></i> Sil</a>
                            <?php
                            }
                            ?>
                                <textarea name="js"  style="height:250px"  class="form-control"><?=$vdata?></textarea>
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
