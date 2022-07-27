//Datemask dd/mm/yyyy
$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
//Datemask2 mm/dd/yyyy
$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' });
//Money Euro
$('[data-mask]').inputmask();

$("#tgl_periksa").change(function(){
    let tipe_auk = $('#tipe_auk').val();
    let tgl_periksa = $(this).val();
    let dis_no_urut = $('#dis_no_urut').val();
    let no_urut = $('#no_urut').val();
    let new_id = generateId(tipe_auk, tgl_periksa, no_urut);
    $("#dis_kode_auk").val(new_id);
    $("#kode_auk").val(new_id);
});

$('.phone_number_3').inputmask('+99-9999999999');

$("#tipe_auk").change(function(){
    let tipe_auk = $(this).val();
    let tgl_periksa = $('#tgl_periksa').val();
    let dis_no_urut = $('#dis_no_urut').val();
    let no_urut = $('#no_urut').val();
    let new_id = generateId(tipe_auk, tgl_periksa, no_urut);
    $("#dis_kode_auk").val(new_id);
    $("#kode_auk").val(new_id);
});

$("#inspector").submit(function() {
     let password = $("#password").val();
     let confirm_password = $("#confirm_password").val();

     if ( password != confirm_password ) {
         alert("password should be same");
         elementSetFocus( "confirm_password" );
         return false;
     }

});

function elementSetFocus( elementID ){
    var element = document.getElementById(elementID);
    element.focus();
    element.scrollIntoView();
};

function show_newId() {
    let tipe_auk = $('#tipe_auk').val();
    let tgl_periksa = $('#tgl_periksa').val();
    let no_urut = $('#no_urut').val();
    let new_id = generateId(tipe_auk, tgl_periksa, no_urut);
    $("#kode_auk").val(new_id);
};

function generateId(tipe, tanggal, reg_id) {
    let tahun = new Date();

    if (tipe == null) tipe = "A";
    if ( tanggal == "" ) {
        tahun = new Date().getFullYear();
    } else {
        tahun = new Date(tanggal).getFullYear();
    }
    if (reg_id == null) reg_id = "";

    return tipe + tahun + reg_id;
};

$("#form_register").submit( function(e) {
    var form = $("#form_register");
    e.preventDefault();

    var name = $("#nama_lengkap").val();
    var email = $("#email").val();
    var title = "Latest Email Confirmation Tester!";
    var message = "Terima kasih atas pendaftaran Anda di sintara.co.id Silahkan melakukan konfirmasi email yang kami kirimkan ke email Anda.";

    $.ajax({
        type: form.attr('method'),
        enctype: "multipart/form-data",
        url: form.attr('action'),
        data: new FormData( this ),
        processData: false,  // Important!
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function ( response ) {
            if ( response == "true" ) {
              $("#success").trigger("play");
              toastr.info('Data Anda berhasil disimpan.');
              // email_confirm(name, email, title, message);
            } else {
              $("#error").trigger("play");
              toastr.error('Ada kendala pada server kami.');
            }
        }
    });

    window.setTimeout(function(){location.reload()},20000);
});
