<script type="text/javascript">
	  var MyTable = $('#list-data').dataTable();
	  var MyTable = $('#list-data-proses').dataTable();

	window.onload = function() {
		<?php
			echo $tampilData."();";
			
		?>
		// tampilPegawai();
		// tampilPosisi();
		// tampilKota();
		// tampilPetambak();
		//tampilBenur();
		<?php
			if ($this->session->flashdata('msg') != '') {
				echo "effect_msg();";
			}
		?>
	}

	function refresh() {
		var MyTable = $('#list-data').dataTable({
			  "paging": false,
			  "lengthChange": true,
			  "searching": true,
			  "info": true,
			  "autoWidth": true,
			  "ordering": false,
			   "scrollX": true,
			  // "scrollY": 350,
			  "footerCallback": function ( row, data, start, end, display ) {
			              var api = this.api(), data;
			   
			              // converting to interger to find total
			              var intVal = function ( i ) {
			                  return typeof i === 'string' ?
			                      i.replace(/[\$,.]/g, '')*1 :
			                      typeof i === 'number' ?
			                          i : 0;
			              };
			   
			              // computing column Total the complete result 
			              var jmlBenur = api
			                  .column( 5 )
			                  .data()
			                  .reduce( function (a, b) {
			                      return intVal(a) + intVal(b);
			                  }, 0 );
			  				
			  			 var jmlkantong = api
			                  .column( 7 )
			                  .data()
			                  .reduce( function (a, b) {
			                      return intVal(a) + intVal(b);
			                  }, 0 );
			  				
			              // Update footer by showing the total with the reference of the column index 
			  			$( api.column( 1 ).footer() ).html('Total');
			            $( api.column( 5 ).footer() ).html(ribuan(jmlBenur));
			            $( api.column( 7 ).footer() ).html((jmlkantong));

			          }
			});
	}

	function refresh_proses() {
		var MyTable = $('#list-data-proses').dataTable({
			  "paging": false,
			  "lengthChange": true,
			  "searching": true,
			  "info": true,
			  "autoWidth": true,
			  "ordering": false,
			  "scrollX": true,
	         "scrollCollapse": true,
			  "footerCallback": function ( row, data, start, end, display ) {
			              var api = this.api(), data;
			   
			              // converting to interger to find total
			              var intVal = function ( i ) {
			                  return typeof i === 'string' ?
			                      i.replace(/[\$,.]/g, '')*1 :
			                      typeof i === 'number' ?
			                          i : 0;
			              };
			   
			              // computing column Total the complete result 
			              var jmlBenur = api
			                  .column( 7 )
			                  .data()
			                  .reduce( function (a, b) {
			                      return intVal(a) + intVal(b);
			                  }, 0 );

			                var jmlcustomBenur = api
			                    .column( 8 )
			                    .data()
			                    .reduce( function (a, b) {
			                        return intVal(a) + intVal(b);
			                    }, 0 );
			  				
			  			 var jmlkantong = api
			                  .column( 10 )
			                  .data()
			                  .reduce( function (a, b) {
			                      return intVal(a) + intVal(b);
			                  }, 0 );
			  				
			              // Update footer by showing the total with the reference of the column index 
			  			$( api.column( 2 ).footer() ).html('Total');
			            $( api.column( 7 ).footer() ).html(ribuan(jmlBenur));
			            $( api.column( 8 ).footer() ).html(ribuan(jmlcustomBenur));
			            $( api.column( 10 ).footer() ).html((jmlkantong));

			          }
			});
	}

	function ribuan(bilangan, cur = '' ) {

		var number_string = bilangan.toString(),
		sisa  = number_string.length % 3,
		rupiaha  = number_string.substr(0, sisa),
		ribuan  = number_string.substr(sisa).match(/\d{3}/g);

		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiaha += separator + ribuan.join('.');
			return cur + rupiaha;
		}

	}

	function effect_msg_form() {
		// $('.form-msg').hide();
		$('.form-msg').show(1000);
		setTimeout(function() { $('.form-msg').fadeOut(1000); }, 3000);
	}

	function effect_msg() {
		// $('.msg').hide();
		$('.msg').show(1000);
		setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
	}

	function tampilPegawai() {
		$.get('<?php echo base_url('Pegawai/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-pegawai').html(data);
			refresh();
		});
	}

	var id_pegawai;
	$(document).on("click", ".konfirmasiHapus-pegawai", function() {
		id_pegawai = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPegawai", function() {
		var id = id_pegawai;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pegawai/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPegawai();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPegawai", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pegawai/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-pegawai').modal('show');
		})
	})

	$('#form-tambah-pegawai').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pegawai/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPegawai();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-pegawai").reset();
				$('#tambah-pegawai').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-pegawai', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pegawai/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPegawai();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-pegawai").reset();
				$('#update-pegawai').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-pegawai').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-pegawai').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//Kota
	function tampilKota() {
		$.get('<?php echo base_url('Kota/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-kota').html(data);
			refresh();
		});
	}

	var id_kota;
	$(document).on("click", ".konfirmasiHapus-kota", function() {
		id_kota = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataKota", function() {
		var id = id_kota;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kota/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilKota();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataKota", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kota/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-kota').modal('show');
		})
	})

	$(document).on("click", ".detail-dataKota", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kota/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-kota').modal('show');
		})
	})

	$('#form-tambah-kota').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Kota/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKota();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-kota").reset();
				$('#tambah-kota').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-kota', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Kota/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKota();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-kota").reset();
				$('#update-kota').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-kota').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-kota').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//Posisi
	function tampilPosisi() {
		$.get('<?php echo base_url('Posisi/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-posisi').html(data);
			refresh();
		});
	}

	var id_posisi;
	$(document).on("click", ".konfirmasiHapus-posisi", function() {
		id_posisi = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPosisi", function() {
		var id = id_posisi;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Posisi/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPosisi();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPosisi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Posisi/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-posisi').modal('show');
		})
	})

	$(document).on("click", ".detail-dataPosisi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Posisi/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-posisi').modal('show');
		})
	})

	$('#form-tambah-posisi').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Posisi/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPosisi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-posisi").reset();
				$('#tambah-posisi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-posisi', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Posisi/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPosisi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-posisi").reset();
				$('#update-posisi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-posisi').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-posisi').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//petambak
		function tampilPetambak() {
		$.get('<?php echo base_url('Petambak/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-petambak').html(data);
			refresh();
		});
	}

	var id_petambak;
	$(document).on("click", ".konfirmasiHapus-petambak", function() {
		id_petambak = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPetambak", function() {
		var id = id_petambak;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Petambak/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPetambak();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPetambak", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Petambak/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-petambak').modal('show');
		})
	})

	$('#form-tambah-petambak').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Petambak/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPetambak();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-petambak").reset();
				$('#tambah-petambak').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-petambak', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Petambak/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPetambak();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-petambak").reset();
				$('#update-petambak').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-petambak').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-petambak').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//benur

	//data benur
</script>