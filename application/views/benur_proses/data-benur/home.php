<div class="msg" style="display:none;">
	<?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
	<div class="box-header">
		<div class="col-md-3">
			<button class="form-control btn btn-primary daftar-dataBenur" >Data Daftar Benur</button>
		</div>

			<div class="col-md-3">
         <a href="<?php echo base_url('benur_proses/data_proses'); ?>" class="form-control btn btn-primary"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Proses Benur</a>
     </div>


		<div class="col-md-3 bg-red form-group">
			<h4 class="text-center bg-red"><span id="total">0</span></h4>

		</div>
	</div>

	<!-- /.box-header -->
	<div class="box-body">


		<table id="list-data-proses" class="table table-bordered table-striped">
			<thead>
				<tr>
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
			<tfoot align="right">
				<tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr>
			</tfoot>
		</table>
	</div>
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



	function tampilBenurProses() {
		$.get('<?php echo base_url('Benur_proses/tampil/'.$jnsBnr); ?>', function(data) {
			// MyTable.fnDestroy();
			$('#data-benur').html(data);
			refresh();
		});
		$.getJSON('<?php echo base_url('Benur_proses/jumlah/'.$jnsBnr); ?>', function(data) {
			$('#total').text((data.jmlBenur));
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
