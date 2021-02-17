<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                    <ul class="nav nav-pills pull-left">
                      <li class="nav-item">
                        <a class="nav-link active" href="#">Standart Üye</a>
                      </li>
                    </ul>
                    <a href="" class="btn btn-success btn-large pull-right">
                    <i class="fas fa-plus"></i>    
                    Yeni Grup</a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Grup İşlemleri <code>Standart üye</code></h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?=input_('Grup Adı','grupadi',[
                            'value'=>'test'
                        ])?>
                    </div>
                </div>
                <div class="row">
                        <div class="col-lg-3">
                            <?=input_('Renk','ayar[renk]',[
                                'id'=>'color'
                            ])?>
                        </div>
                        <div class="col-lg-9">
                            <?=input_('Not','ayar[not]')?>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
               <h4>Para Yatırma İzinleri</h4>
            </div>
            <div class="card-body">
                    <?php 
                        $json = getSetting_();
                        $j = $json['ParaYatirmaIzinleri']['gunlukLimit'];
                        $s = $json['ParaYatirmaIzinleri']['CekimdeDiscountTutariniAl'];
                        echo select_('Günlük limit ne kadar ?','py_gunliklimit',keyValue($j));
                        echo select_(' Çekimde bakiyeden discount tutarını al ','py_discount',keyValue($s));
                    ?>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
    <div class="card">
        <div class="card-header">
               <h4>PARA ÇEKİM İZİNLERİ</h4>
            </div>
            <div class="card-body">
                    <?php 
                        $json = getSetting_();
                        $j = $json['ParaCekimIzinleri']['CekimdeDiscountTutariniAl'];
                       
                        echo select_(' Çekimde bakiyeden discount tutarını al ','py_discount',keyValue($j));
                    ?>
            </div>
        </div>                   
    </div>
    <div class="col-lg-4"></div>
</div>

