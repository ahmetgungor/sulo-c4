<div class="row">
    <div class="col-lg-12">
    <?= view('App\Views\admin\sabit\_notification') ?>
    </div>
</div>
<?php

    if(!empty($id))
    {
        $postUrl = 'indexUPDATE';
    }else{
        $postUrl = 'indexPOST';
    }
    
?>
<form action="<?=base_url('admin/yazi/'.$postUrl.'/'.$tip.'/'.$yaziid.'?id='.$id)?>" method="post">
<div class="row">

    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php print_r($baslik);?>
                        <?=input_('Başlık','baslik',['id'=>'baslik','value'=>$baslik])?>
                        <?=input_('Link','link',['id'=>'link','value'=>$link])?>
                        <textarea name="aciklama" id="editor1" cols="30" rows="10"><?=$aciklama?></textarea>
                        <hr>
                        <?=input_('Ek Alan <small>icon - url - Ek Açıklama</small>','ekalan',['id'=>'ekalan','value'=>$ekalan])?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                    <input type="submit" value="Kaydet" class="btn btn-success btn-block">
                    <hr>
                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                      
                      <li class="nav-item">
                        <a class="nav-link active" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Ayarlar</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link " id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Google</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent2">
                      <div class="tab-pane fade " id="home3" role="tabpanel" aria-labelledby="home-tab3">
                        <div class="row">
                            <div class="col-lg-12">
                                <?=input_('Title','title',['value'=>$g_title])?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="g_desc" id="" class="form-control"><?=$g_desc?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Keywords</label>
                                    <textarea name="g_keyw" id="" class="form-control"><?=$g_keyw?></textarea>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="tab-pane fade active show" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                        <div class="row mt-2">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="control-label"></div>
                                    <label class="custom-switch " style="padding-left:0rem;">
                                        <input type="checkbox" <?=($yayin == 0)?:'checked'?> name="yayin" class="custom-switch-input">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description"> Yazı Yayınlansınmı ?</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                            <?php
                               $setting =  getSetting_();
                             
                            ?>
                                <?=select_('Dil Seçin','dil',keyValue($setting['Genel']['dil']),$dil)?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <?=select_('Tasarım','tasarim',keyValue($setting['Genel']['tasarim']),$tasarim)?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <?=select_('Üst Menu','ustmenu',[0=>'Üst Menü Seçin'],$ustmenu)?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <?=select_('Site','site',keyValue($setting['Genel']['site']),$site)?>
                            </div>
                        </div>

                      </div>
                      
                    </div>
            </div>
        </div>
    </div>
</div>
</form>

<div class="row">
<?php
if(!empty($id))
{
    echo view('admin/resim',['id'=>$id]);
}


?>
</div>