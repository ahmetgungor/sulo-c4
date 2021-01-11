<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Kullanıcı Listesi</h4>
            </div>
            <div class="card-body">
            
 
<?php
/** 
 TODO KULLANICI BAKİYE VE üye grubu YENİDEN GÖZDEN GEÇİRİLECEK 
    */
?>
<table id="dataTable" class=" table table-bordered" >
        <thead>
            <tr>
                <th>id</th>
                <th>isimSoyisim</th>
                <th>Kullanıcı Adı</th>
                <th>Tc</th>
                <th>Bakiye</th>
                <th>Kayıt Tarihi</th>
                <th>Üye Grubu</th>
                <th>Detay</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($userlist as $key => $value) {
            ?>
            <tr>
                    <td><?=$value['id']?></td>
                    <td><?=$value['isimsoyisim']?></td>
                    <td><?=$value['kadi']?></td>
                    <td><?=$value['tc']?></td>
                    <td></td>
                    <td><?=$value['ktarihi']?></td>
                    <td></td>
                    <td><a href="" class="btn btn-info">Detay <i class="fa fa-find"></i></a> </td>
            </tr>

            <?php
                }
            ?>

        </tbody>
        <tfoot>
            <tr>
                <th>id</th>
                <th>isimSoyisim</th>
                <th>Kullanıcı Adı</th>
                <th>Tc</th>
                <th>Bakiye</th>
                <th>Kayıt Tarihi</th>
                <th>Üye Grubu</th>
                <th>Detay</th>
            </tr>
        </tfoot>
    </table>

    </div>
        </div>
    </div>
</div>