// fetch data from MySQL
var dataTableMember = $('#member_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
				url:"./scripts/fetch_anggota_tbl.php",
				type:"POST"
		},
		"columnDefs":[{
				data: 0,
				className: 'text-center',
				targets:0,
				orderable: true
			},{
				data: 1,
				className: 'font-weight-bold',
				targets:1,
				render: function(data,type,full,meta) {
					return data;
				}
			},{
				data: 2,
				targets:2,
				render: function(data,type,full,meta) {
						const event = new Date(data);
						const options = { dateStyle: 'long' };
						const date = event.toLocaleString('id-ID', options);
						return date;
				}
			},{
				data: 5,
				targets:5,
				render: function(data,type,full,meta) {
						return '<a href="mailto:' + data + '">' + data + '</a>';
				}
		},{
				data: 1,
				targets:-1,
				render: function(data,type,full,meta) {
						return '<div class="btn-group" role="group">' +
										  '<button type="button" onclick="member_detail(\'' + data + '\')" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fas fa-list"></i></button>' +
										  '<button type="button" onclick="confirm_disetujui(\'' + data + '\')" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Disetujui"><i class="fas fa-handshake"></i></button>' +
										  '<button type="button" onclick="confirm_ditolak(\'' + data + '\')" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Ditolak"><i class="fas fa-times-circle"></i></button>' +
										 	'<button type="button" onclick="confirm_del_anggota(\'' + data + '\')" class="btn btn-secondary btn-sm data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash"></i></button>' +
										'</div>';
				}
		}],
	    select: {
	    style: 'os',
	    selector: 'td:first-child'
	  },
	    order: [[ 1, 'asc' ]],
	    dom: 'Blfrtip',
	    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
});

// fetch data from MySQL
var dataTableDisetujui = $('#disetujui_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
				url:"./scripts/fetch_disetujui_tbl.php",
				type:"POST"
		},
		"columnDefs":[{
				data: 0,
				className: 'text-center',
				targets:0,
				orderable: true
		},{
				data: 1,
				className: 'font-weight-bold',
				targets:1,
				render: function(data,type,full,meta) {
						return data;
				}
		},{
				data: 2,
				targets:2,
				render: function(data,type,full,meta) {
						const event = new Date(data);
						const options = { dateStyle: 'long' };
						const date = event.toLocaleString('id-ID', options);
						return date;
				}
		},{
				data: 5,
				targets:5,
				render: function(data,type,full,meta) {
						return '<a href="mailto:' + data + '">' + data + '</a>';
				}
		},{
				data: 1,
				targets:-1,
				render: function(data,type,full,meta) {
						return '<div class="btn-group" role="group">' +
										  '<button type="button" onclick="member_detail(\'' + data + '\')" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fas fa-list"></i></button>' +
										  '<button type="button" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Disetujui"><i class="fas fa-handshake"></i></button>' +
										  '<button type="button" onclick="confirm_del_disetujui(\'' + data + '\')" class="btn btn-secondary btn-sm data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash"></i></button>' +
										'</div>';
				}
		}],
				select: {
	      style: 'os',
	      selector: 'td:first-child'
	  },
		    order: [[ 1, 'asc' ]],
		    dom: 'Blfrtip',
		    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
});

// fetch data from MySQL
var dataTableDitolak = $('#ditolak_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"./scripts/fetch_ditolak_tbl.php",
			type:"POST"
		},
		"columnDefs":[
		{
			data: 0,
			className: 'text-center',
			targets:0,
			orderable: true
		},{
			data: 1,
			className: 'font-weight-bold',
			targets:1,
			render: function(data,type,full,meta) {
					return data;
			}
		},{
			data: 2,
			targets:2,
			render: function(data,type,full,meta) {
					const event = new Date(data);
					const options = { dateStyle: 'long' };
					const date = event.toLocaleString('id-ID', options);
					return date;
			}
		},{
			data: 5,
			targets:5,
			render: function(data,type,full,meta) {
					return '<a href="mailto:' + data + '">' + data + '</a>';
			}
		},{
			data: 1,
			targets:-1,
			render: function(data,type,full,meta) {
					return '<div class="btn-group" role="group">' +
									  '<button type="button" onclick="member_detail(\'' + data + '\')" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fas fa-list"></i></button>' +
									  '<button type="button" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Disetujui"><i class="fas fa-handshake"></i></button>' +
									  '<button type="button" onclick="confirm_del_ditolak(\'' + data + '\')" class="btn btn-secondary btn-sm data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash"></i></button>' +
									'</div>';
			}
		}],
    select: {
      style: 'os',
      selector: 'td:first-child'
    },
    order: [[ 1, 'asc' ]],
    dom: 'Blfrtip',
    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
});

function confirm_disetujui(kode) {
		// Add Member ID to the hidden field for furture usage
		$("#hidden_anggota_id").val(kode);
		// Open modal popup
		$("#accept_anggota_modal").modal("show");
};

function confirm_ditolak(kode) {
		// Add Member ID to the hidden field for furture usage
		$("#hidden_anggota_id").val(kode);
		// Open modal popup
		$("#reject_anggota_modal").modal("show");
};

function accept_anggota() {
		// get hidden field value
		var no_id = $("#hidden_anggota_id").val();

		$.ajax({
				method: 'POST',
				url: './scripts/actions_lib.php',
				data: { aksi: 'accept', kode: no_id  },
				datatype: 'json',
				success: function (response) {
						if ( response == true ) {
								$("#success").trigger("play");
								toastr.success("Aksi disetujui berhasil!");
						} else {
								$("#error").trigger("play");
								toastr.error("Aksi disetujui gagal!");
						}
						$("#accept_anggota_modal").modal("hide");
						window.setTimeout(function(){location.reload()},3000)
				}
		});
};

function reject_anggota() {
		// get hidden field value
		var no_id = $("#hidden_anggota_id").val();
		var txt_alasan = $("#txt_alasan").val();

		$.ajax({
				method: 'POST',
				url: './scripts/actions_lib.php',
				data: { aksi: 'reject', kode: no_id, alasan:txt_alasan  },
				datatype: 'json',
				success: function (response) {
						if ( response == true ) {
								$("#success").trigger("play");
								toastr.success("Aksi penolakan berhasil!");
						} else {
								$("#error").trigger("play");
								toastr.error("Aksi penolakan gagal!");
						}
						$("#reject_anggota_modal").modal("hide");
						window.setTimeout(function(){location.reload()},3000)
				}
		});
};

function confirm_del_anggota(kode) {
		// Add Member ID to the hidden field for furture usage
		$("#hidden_anggota_id").val(kode);
		// Open modal popup
		$("#delete_anggota_modal").modal("show");
};

function confirm_del_disetujui(kode) {
		// Add Rejection ID to the hidden field for furture usage
		$("#hidden_disetujui_id").val(kode);
		// Open modal popup
		$("#delete_disetujui_modal").modal("show");
};

function confirm_del_ditolak(kode) {
		// Add Rejection ID to the hidden field for furture usage
		$("#hidden_ditolak_id").val(kode);
		// Open modal popup
		$("#delete_ditolak_modal").modal("show");
};

function delete_row_anggota() {
		// get hidden field value
		var no_id = $("#hidden_anggota_id").val();

		$.ajax({
				method: 'POST',
				url: './scripts/actions_lib.php',
				data: { table:'anggota_tbl', aksi: 'hapus', kode: no_id },
				datatype: 'json',
				success: function (response) {
						if ( response == true ) {
								$("#success").trigger("play");
								toastr.success("Data telah dihapus!");
						} else {
								$("#error").trigger("play");
								toastr.error("Data gagal dihapus!");
						}
						$("#delete_anggota_modal").modal("hide");
						window.setTimeout(function(){location.reload()},3000)
				}
		});
};

function delete_row_disetujui() {
	// get hidden field value
	var no_id = $("#hidden_disetujui_id").val();

	$.ajax({
			method: 'POST',
			url: './scripts/actions_lib.php',
			data: { table:'pengguna_tbl', aksi:'hapus', kode:no_id },
			datatype: 'json',
			success: function (response) {
					if ( response == true ) {
							$("#success").trigger("play");
							toastr.success("Data telah dihapus!");
					} else {
							$("#error").trigger("play");
							toastr.error("Data gagal dihapus!");
					}
					$("#delete_disetujui_modal").modal("hide");
					window.setTimeout(function(){location.reload()},3000)
			}
	});
};

function delete_row_ditolak() {
	// get hidden field value
	var no_id = $("#hidden_ditolak_id").val();

	$.ajax({
			method: 'POST',
			url: './scripts/actions_lib.php',
			data: { table:'ditolak_tbl', aksi:'hapus', kode:no_id },
			datatype: 'json',
			success: function (response) {
					if ( response == true ) {
							$("#success").trigger("play");
							toastr.success("Data telah dihapus!");
					} else {
							$("#error").trigger("play");
							toastr.error("Data gagal dihapus!");
					}
					$("#delete_ditolak_modal").modal("hide");
					window.setTimeout(function(){location.reload()},3000);
			}
	});
};

function member_detail(member_id) {
		$.ajax({
					method: 'POST',
					url: './scripts/actions_lib.php',
					data: { table:'anggota_tbl', aksi:'tampil', kode:member_id },
					datatype: 'JSON',
					success: function ( myData ) {

						$.each( JSON.parse( myData ), function( index, value ) {
								$("#kode_auk").text( value.kode_auk );
								$("#nama_lengkap").html( "<strong>" + value.nama_lengkap + "</strong>" );
								$("#email").html( "<a href='mailto:" + value.email + "'>" + value.email + "</a>" );
								$("#no_telp").text( value.no_telp );
								$("#tgl_register").text( value.tgl_register );

								var profile_img = "./images/" + value.kode_auk + "/" + value.profile_img;
								var resume_img = "./images/" + value.kode_auk + "/" + value.resume_img;
								var doc1_img = "./images/" + value.kode_auk + "/" + value.doc1_img;
								var doc2_img = "./images/" + value.kode_auk + "/" + value.doc2_img;
								var doc3_img = "./images/" + value.kode_auk + "/" + value.doc3_img;
								var doc4_img = "./images/" + value.kode_auk + "/" + value.doc4_img;

								$("#img_list").empty(); // Clear everything before append new elements

								if ( value.profile_img.length != 0 ) insert_image(  value.profile_img, profile_img );
								if ( value.resume_img.length != 0 ) insert_image( value.resume_img, resume_img );
								if ( value.doc1_img.length != 0 ) insert_image( value.doc1_img, doc1_img );
								if ( value.doc2_img.length != 0 ) insert_image( value.doc2_img, doc2_img );
								if ( value.doc3_img.length != 0 ) insert_image( value.doc3_img, doc3_img );
								if ( value.doc4_img.length != 0 ) insert_image( value.doc4_img, doc4_img );

						});

				 }
		});
		// Open modal popup
		$("#profile_info_modal").modal("show");
};

function insert_image( file_nm, image_src ) {
		$("#img_list").append("<div class='col-sm-2'>" +
			"<a href='" + image_src + "' data-toggle='lightbox' data-title='" + file_nm + "' data-gallery='gallery'>" +
			"<img src='" + image_src + "' class='img-fluid mb-2' alt='white sample'/>" +
			"</a></div>");

		return true;
};
