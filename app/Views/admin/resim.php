<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


  


<link rel="stylesheet" href="/admin/css/style.css">
<link rel="stylesheet" href="/admin/css/components.css">


<div class="container">
    <form id="myDropzone" method="post" action="<?=base_url()?>/admin/resim/fileUpload/<?=$id?>" class="dropzone">

    </form>
    <button id="submit-all" class="btn btn-info">Yükle</button>
</div>


<div class="container mt-3">
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info">
            <strong> Bilgi</strong> Resmin Üzerine Tıklayarak Öne Çıkan Resim Seçebilirsiniz
        </div>
    </div>
</div>
<form  name="imageDetail" id="imageDetail">
<div class="row">
    <div class="col-lg-12">
        <a href="javascript:;" class="btn btn-success pull-right" id="saveImage"> Tüm Resim Bilgilerini Kaydet</a>
    </div>
</div>
   
    <div class="row" id="liste">
        
       
    </div>
</form>
</div>



<script>
var idd = <?=$id?>;
var base_url = "<?=base_url()?>";
</script>



<script id="resim_tema" type="text/html">

<div class="col-lg-6 mt-3">
 <div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4">
                    <label class="imagecheck">
                        <input type="radio" name="data[selectImg]" 
                        {{if onecikan ==1}}
                        checked
                        {{/if}}
                         class="imagecheck-input" value="${id}">
                        <figure class="imagecheck-figure">
                            <img src="/uploads/${resim}" alt="" class="imagecheck-image">
                        </figure>
                        <input type="button" value="Sil" class="btn btn-danger btn-block mt-1" onclick="sil(${id})">
                    </label>
            </div>
            <div class="col-lg-8">
                <div class="form-group">
                    <label>Title </label>
                    <input type="text" name="data[${id}][title]" value="${slide_adi}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Link</label>
                    <input type="text" name="data[${id}][link]" value="${link}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Açıklama</label>
                    <textarea name="data[${id}][aciklama]" class="form-control">${aciklama}</textarea>
                </div>
            </div>
        </div>
    </div>
 </div>
</div>
        
</script>