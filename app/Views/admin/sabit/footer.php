<footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script
  src="https://code.jquery.com/jquery-migrate-3.3.2.min.js"
  integrity="sha256-Ap4KLoCf1rXb52q+i3p0k2vjBsmownyBTE1EqlRiMwA="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?=base_url()?>/admin/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="<?=base_url()?>/admin/js/scripts.js"></script>
  <script src="<?=base_url()?>/admin/js/custom.js"></script>
  <script src="<?=base_url()?>/admin/js/jquery.mask.js"></script>
  <script src="<?=base_url()?>/admin/js/jquery.friendurl.min.js"></script>
  <!-- Page Specific JS File -->
<script>
$(function(){
	$('#baslik').friendurl({id : 'link', divider: '-', transliterate: true});
});
</script>
  <script src="<?=base_url()?>/admin/js/datatables/datatables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.css"/>

  <!-- color -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.2.0/css/bootstrap-colorpicker.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.2.0/js/bootstrap-colorpicker.min.js"></script>


  <script src="<?=base_url()?>/admin/js/ckeditor/ckeditor.js"></script>
</body>
</html>

<script>
$(document).ready(function() {
    $('#dataTable').DataTable();
    $('#color').colorpicker();
    CKEDITOR.replace( 'editor1',{
      filebrowserBrowseUrl: '<?=base_url()?>/admin/js/ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl: '<?=base_url()?>/admin/js/ckfinder/ckfinder.html?type=Images',
      filebrowserUploadUrl: '<?=base_url()?>/admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl: '<?=base_url()?>/admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
    } );
    
} );
</script>

<link rel="stylesheet" href="<?=base_url()?>/admin/js/dropzone/min/dropzone.min.css">


<script src="<?=base_url()?>/admin/js/dropzone/min/dropzone.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script> -->
<script src="https://ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script>
<script src="<?=base_url()?>/admin/js/resim.js?v=<?=rand(0,999999)?>"></script>
<script src="<?=base_url()?>/admin/js/jquery-menu-editor.js"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>
<link rel="stylesheet" href="<?=base_url()?>/admin/js/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css">
<script type="text/javascript" src="<?=base_url()?>/admin/js/bootstrap-iconpicker/js/bootstrap-iconpicker.min.js"></script>
<script>


var sortableListOptions = {
    placeholderCss: {'background-color': "#cccccc"}
};
var iconPickerOptions = {searchText: "Buscar...", labelHeader: "{0}/{1}"};
var editor = new MenuEditor('myEditor', 
            { 
            listOptions: sortableListOptions, 
            iconPicker: iconPickerOptions,
            textConfirmDelete:"Silmek İstediğinize Eminmisiniz ?",
            maxLevel: 10 // (Optional) Default is -1 (no level limit)
            // Valid levels are from [0, 1, 2, 3,...N]
            });
            editor.setData(arrayjson);
            var str = editor.getString();
            $("#myTextarea").text(str);

            $('#kaydetMenu').click(function(e){
              
              var str = editor.getString();
              console.log(str)
              $("#myTextarea").text(str);
              $.post(base_url+"/admin/menu/indexupdate","json="+str).success(function(e){
                console.log(e);
                swal({
                    title: "Menü İşlemleri",
                    text: "Menu Düzenlemeleriniz Kayıt Edildi !",
                    icon: "success",
                    button: "Kapat",
                    });

              })
            })
  /*
  $("#kaydetMenu").click(function(){
    var kmenu_json = $("#myTextarea").val();
    
  })
*/

</script>