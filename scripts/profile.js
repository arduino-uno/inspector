function profile_detail( member_id ) {
   $.ajax({
        method: 'POST',
        url: './scripts/actions_lib.php',
        data: { table:'anggota_tbl', aksi:'tampil', kode:member_id },
        datatype: 'JSON',
        success: function ( myData ) {
            $.each( JSON.parse( myData ), function( index, value ) {
                console.log(value.nama_login);
                $("img.avatar").attr( "src", "./images/" + value.kode_auk + "/" + value.profile_img );
                $("#dis_kode_auk").val( value.kode_auk );
                $("#kode_auk").val( value.kode_auk );
                $("#nama_login").val( value.nama_login );
                $("#nama_lengkap").val( value.nama_lengkap );
                $("#email").val( value.email );
                $("#no_telp").val( value.no_telp );
                $("textarea#alamat").val( value.alamat );
            });
        }
    })
};

$("#form_profile").submit( function(e) {
    var form = $("#form_profile");
    e.preventDefault();

    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: new FormData( this ),
        processData: false,  // Important!
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function ( response ) {
            if ( response == "true" ) {
              $('#success').trigger("play");
              toastr.info('Data Anda berhasil disimpan.');
              // email_confirm(name, email, title, message);
            } else {
              $('#error').trigger("play");
              toastr.error('Ada kendala pada server kami.');
            }
        }
    });

    window.setTimeout(function(){location.reload()}, 3000);
});
