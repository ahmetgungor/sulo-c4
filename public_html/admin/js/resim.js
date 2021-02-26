
    $(document).ready(function () {

        getjson()
        // var myDropzone = new Dropzone("#dropzone_yeni", { url: "/file/post"});
        var ae ={};
        $("#saveImage").click(function(e){
            var ae = $( "form" ).serializeArray();
            
            $.post(base_url+"/admin/resim/updateResim/"+idd,objectifyForm(ae)).done(function(e){
                console.log(e);
                swal({
                    title: "Kayıt Edildi",
                    text: "Resimler İçin Yazdığınız Bilgiler Kayıt Edildi",
                    icon: "success",
                    button: "Kapat",
                    });
            });
        });
        
    })

    function sil(id)
    {
        swal({
            title: "Silmek İstediğinize Emin misiniz ?",
            text: "Görseli Silmek İstediğinize Emin misiniz?",
            icon: "warning",
            buttons: ["Vazgeç","Sil"],
            dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete)
                if (willDelete) {
                    console.log(id);
                    $.post(base_url+"/admin/resim/delete/"+idd,{'id':id}).success(function(e){
                        $("#liste").html("");
                        getjson()
                        
                    });
                    
                }
            });
    }
    function objectifyForm(formArray) {
        //serialize data function
        var returnArray = {};
        for (var i = 0; i < formArray.length; i++){
            returnArray[formArray[i]['name']] = formArray[i]['value'];
        }
        return returnArray;
    }
    Dropzone.options.myDropzone = {
        // Prevents Dropzone from uploading dropped files immediately
        autoProcessQueue: false,
        acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
        dictDefaultMessage:'Dosyaları yüklemek için buraya bırakın',
        maxFilesize: 1,
        parallelUploads: 10,
        addRemoveLinks: true,
        init: function () {
            var submitButton = document.querySelector("#submit-all")
            myDropzone = this; // closure

            submitButton.addEventListener("click", function () {
                myDropzone.processQueue();
                // autoProcessQueue: true// Tell Dropzone to process all queued files.
            });
            this.on("complete", function (file) {
                $("#liste").html("");
                getjson();
            });
            // You might want to show the submit button only when 
            // files are dropped here:
            this.on("addedfile", function () {
              
            });

        }
    };


    function getjson() {
        $("#resim_tema").html();
        $.get(base_url+"/admin/resim/jsonlist/"+idd).success(function (e) {
         
          console.log(e)
            $("#resim_tema").tmpl(e).appendTo('#liste')
        })
    }
var i =0;