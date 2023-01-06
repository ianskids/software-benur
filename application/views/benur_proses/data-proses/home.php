<div class="msg" style="display:none;">
	<?php echo @$this->session->flashdata('msg'); ?>
</div>
<div class="form-msg"></div>
<div class="box">
	<div class="box-header">
		<div class="col-md-3">
         <a href="<?php echo base_url('benur_proses'); ?>" class="form-control btn btn-primary"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Data Daftar Benur</a>
     </div>


		<div class="col-md-3">
			<button class="form-control btn btn-primary proses-dataBenur"> Proses Benur</button>
		</div>

		<div class="col-md-3 bg-red form-group">
			<h4 class="text-center bg-red"><span id="total">0</span></h4>

		</div>
	</div>
	
	<form method="POST" id="form-kode-benur">
		<div class="col-sm-12">
		
			<div class="col-sm-2">
				<div class="form-group form-group-sm">
					<label for="Kode">Kode</label>
					<input type="text" class="form-control" placeholder="Kode Benur" name="kode" id="kode" aria-describedby="sizing-addon2" value="">
				</div>

				<div class="form-group form-group-sm">
					<label for="Alamat">Isi Perkantong</label>
					<input type="text" class="form-control" placeholder="Isi Kantong" name="perkantong" id="perkantong" aria-describedby="sizing-addon2" value="" onkeyup="sum_selisih()">
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group form-group-sm">
					<label for="Alamat">Stok tersedia</label>
					<input type="text" class="form-control" placeholder="Stok dari BLK" name="stok" id="stok" aria-describedby="sizing-addon2" value="" onkeyup="sum_selisih()">
				</div>

				<div class="form-group form-group-sm">
					<label for="Alamat">Stok Kebutuhan</label>
					<input type="text" class="form-control" placeholder="Stok Kebutuhan" name="kebutuhan" id="kebutuhan" aria-describedby="sizing-addon2" value="" onkeyup="sum_selisih()">
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group form-group-sm">
					<label for="Alamat">Selisih</label>
					<input type="text" class="form-control" placeholder="Stok Kebutuhan" name="selisih" id="selisih" aria-describedby="sizing-addon2" value="" >
				</div>

					<div class="form-group form-group-sm">
						<label for="Alamat">Simpan</label>
						<button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
					</div>

			</div>
			<div class="col-sm-2">
				<div class="form-group form-group-sm">
					<label for="Alamat">Selisih Kantong</label>
					<input type="text" class="form-control" placeholder="Stok Kebutuhan" name="selisihKantong" id="selisihKantong" aria-describedby="sizing-addon2" value="" >
				</div>
			</div>

			
		
	</div>
	<!-- /.box-header -->
	<div class="box-body">

		<table id="list-data-proses" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th><input type="checkbox" name="select-all" id="select-all" /></th>
					<th>No</th>
					<th>Alamat</th>
					<th>Register</th>
					<th>Nama</th>
					<th>jnsBenur</th>
					<th>kode</th>
					<th>jmlBenur</th>
					<th>jmlBenur Edit</th>
					<th>perkantong</th>
					<th>jmlkantong</th>
					<th>nama_agen</th>
					<th>Tanggal Tebar</th>
					<th style="text-align: center;">Aksi</th>
				</tr>
			</thead>
			<tbody id="data-benur">

			</tbody>
			<tfoot>
				<tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr>
			</tfoot>
		</table>

	</div>
	</form>
</div>



<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataBenur', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php show_my_confirm('konfirmasiPrint', 'print-dataBenur', 'Print Data Ini?', 'Ya, Print Data Ini'); ?>

<?php
$data['judul'] = 'Benur';
$data['url'] = 'Benur/import';
echo show_my_modal('modals/modal_import', 'import-benur', $data);
?>

<script type="text/javascript">
	$('#select-all').click(function(event) {   
	    if(this.checked) {
	        // Iterate each checkbox
	        $(':checkbox').each(function() {
	            this.checked = true;                        
	        });
	    } else {
	        $(':checkbox').each(function() {
	            this.checked = false;                       
	        });
	    }
	}); 
	function sum_selisih() {

		var perkantong = document.getElementById('perkantong').value;
		var stok = document.getElementById('stok').value;
		var kebutuhan = document.getElementById('kebutuhan').value;

		var result = (stok.replace(/[^,\d]/g, '').toString()) - (kebutuhan.replace(/[^,\d]/g, '').toString());
		let selisihK = result / (perkantong.replace(/[^,\d]/g, '').toString());
		if (!isNaN(result)) {
			document.getElementById('selisih').value = (result);
		}
		if (!isNaN(selisihK)) {
			document.getElementById('selisihKantong').value = (selisihK);
		}
	}
	function tampilBenurProses() {
		$.get('<?php echo base_url('Benur_proses/tampil_proses/'.$jnsBnr.'/proses'); ?>', function(data) {
			 MyTable.fnDestroy();
			$('#data-benur').html(data);
			 refresh_proses();
		});
		$.getJSON('<?php echo base_url('Benur_proses/jumlah/'.$jnsBnr.'/proses'); ?>', function(data) {
			$('#total').text((data.jmlBenur));
			document.getElementById('kebutuhan').value = (data.jmlBenur);
		});
	}


	var id_benur;
	$(document).on("click", ".detail-dataBenur", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Benur_proses/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#detail-benur').modal('show');
		})
	})


	$(document).on('submit', '#form-proses-benur', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('benur_proses/prosesInsert'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilBenurProses();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-proses-benur").reset();
				$('#detail-benur').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on('submit', '#form-kode-benur', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('benur_proses/prosesInsertKode'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilBenurProses();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				$('#detail-benur').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});


	$(document).on("click", ".konfirmasiHapus-benur", function() {
		id_benur = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataBenur", function() {
		$('#detail-benur').modal('hide');
		var id = id_benur;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('benur/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');

			tampilBenurProses();
			$('.msg').html(data);
			effect_msg();
		})
	})

	function wait(ms){
		var start = new Date().getTime();
		var end = start;
		while(end < start + ms) {
			end = new Date().getTime();
		}
	}


</script>
