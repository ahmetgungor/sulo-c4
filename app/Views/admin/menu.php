<div class="row">
    <div class="col-lg-12">
        <?=view('App\Views\admin\sabit\_notification') ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="get"  class="form">
                    <div class="row">
                        <div class="col-lg-3">
                        <?php
                        $ayarlar = getSetting_();
                        echo select_("Menu İçin Site Seçin","site",keyValue($ayarlar['Genel']['site']),$site)?>
                        </div>
                        <div class="col-lg-3">
                        <?=select_("Menu İçin Dil Seçin","dil",keyValue($ayarlar['Genel']['dil']),$dil)?>
                        </div>
                        <div class="col-lg-3">
                        <?=select_("Menu Konumu Seçin","konum",keyValue($ayarlar['Genel']['konum']),$konum)?>
                        </div>
                        <div class="col-lg-3"><label for="">&nbsp;</label>
                            <input type="submit" value="Menu Göster" class="btn btn-warning btn-block btn-block btn-large">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    if(!empty($site) && !empty($konum) &&  !empty($dil)):
?>
<script>
var arrayjson = <?=$json_menu?>;
</script>
<div class="row">
    <div class="col-lg-3">
    <form action="<?=base_url('admin/menu/indexPOST')?>?site=<?=$site?>&dil=<?=$dil?>&konum=<?=$konum?>&i=aktar" method="POST" class="form">
        <h5>Kategoriler</h5>
        <div class="card">
            <div class="card-body">
            <div id="kategori">
                <?php
                foreach ($kategoriList as $key => $value):
                ?>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="sayfalar[]" value="<?=$value['id']?>" id="exampleCheck1<?=$value['id']?>">
                    <label class="form-check-label" for="exampleCheck1<?=$value['id']?>"><?=$value['baslik']?></label>
                </div>
                <?php
                endforeach;
                ?>
            </div>
            </div>
        </div>
        <h5 class="mt-1">Sayfalar</h5>
        <div class="card">
                <div class="card-body">
                <div id="sayfa">
                <?php
                foreach ($pageList as $key => $value):
                ?>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="sayfalar[]" value="<?=$value['id']?>" id="exampleCheck1<?=$value['id']?>">
                    <label class="form-check-label" for="exampleCheck1<?=$value['id']?>"><?=$value['baslik']?></label>
                </div>
                <?php
                endforeach;
                ?>
                
                <hr>
                <?php
                foreach ($kanalListesi as $key => $value):
                ?>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="sayfalar[]" value="<?=$value['id']?>" id="exampleCheck1<?=$value['id']?>">
                    <label class="form-check-label" for="exampleCheck1<?=$value['id']?>"><?=$value['baslik']?></label>
                </div>
                <?php
                endforeach;
                ?>
                </div>
                </div>
        </div>
        <input type="submit" value="Seçili Olanları Aktar" class="btn btn-block btn-warning btn-large">
    </form>
    </div>
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <ul id="myEditor" class="sortableLists list-group">
                </ul>
            </div>
            
        
            <div class="card-footer text-right">
                <input type="button" value="Kaydet" id="kaydetMenu" class="btn btn-large btn-info pull-right">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <textarea name=""  id="myTextarea" cols="30" rows="10" style="display:none"></textarea>
    </div>
</div>
<?php endif;?>