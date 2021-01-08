<?=$header?>
<?=$leftmenu?>
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?=$title?></h1>
          </div>

          <div class="section-body">
          <?=$content?>
          </div>
        </section>
</div>
<?=$footer?>
<script>
function rasteleSembol(uzunluk, semboller) {
    var maske = '';
    if (semboller.indexOf('a') > -1) maske += 'abcdefghijklmnopqrstuvwxyz';
    if (semboller.indexOf('A') > -1) maske += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    if (semboller.indexOf('0') > -1) maske += '0123456789';
    if (semboller.indexOf('#') > -1) maske += '~`!@#$%^&*()_+-={}[]:";\'<>?,./|\\';
    var sonuc = '';
    
    for (var i = uzunluk; i > 0; --i) 
    {
    sonuc += maske[Math.floor(Math.random() * maske.length)];
    }
    return sonuc;
}
$(document).ready(function(){
    $('.placeholder').mask("(000)000-00-00", {placeholder: "(___)___-__-__"});
    $('.dtarihi').mask("00-00-0000", {placeholder: "__-__-____"});
    $("#sifre_uret").click(function(){
        var sifre = rasteleSembol(12, 'aA0');
        $("#sifre1").val(sifre);
        $("#sifre2").val(sifre);
    })
})
</script>