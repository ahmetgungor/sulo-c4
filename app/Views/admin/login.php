<?= view('App\Views\admin\sabit\_notification') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Kullanıcı Kayıt</h4>
            </div>
            <form action="<?=(!empty($id))?base_url('admin/login/update/'.$id):'?post=1' ?>" method="post" onsubmit="registerButton.disabled = true; return true;">
            <?= csrf_field() ?>
            <div class="card-body">
            
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Kullanıcı Adı</label>
                            <input type="text" name="kadi" class="form-control" value="<?=$user['kadi']?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>İsim Soyisim</label>
                            <input type="text" name="isimsoyisim"  value="<?=$user['isimsoyisim']?>" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Şifre </label>
                            <input type="text" name="sifre" id="sifre1" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Şifre <small>Tekrar</small></label>
                            <div class="input-group">
                                <input type="text" name="sifre2" id="sifre2" class="form-control">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" name="sifre2" id="sifre_uret" type="button">Şifre Üret</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>E-mail Adresi</label>
                            <input type="text" name="email" id="email" value="<?=$user['email']?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Gsm Adresi</label>
                            <input type="text" name="gsm" value="<?=$user['gsm']?>" id="gsm" class="placeholder form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Dogum Tarihi</label>
                            <input type="text" name="dogumtarihi" value="<?=$user['dogumtarihi']?>" id="dogumtarihi" class="dtarihi form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                            <label>Tc:</label>
                            <input type="text" name="tc" value="<?=$user['tc']?>" id="tc" class=" form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                                <label>Not Alanı:</label>
                                <textarea name="notalani" id="" class="form-control"><?=$user['notalani']?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" name="registerButton" class="btn btn-primary pull-right">Kaydet</button>
            </div>
            </form>
        </div>
    </div>
</div>