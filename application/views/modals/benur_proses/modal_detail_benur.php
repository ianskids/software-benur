
<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
	<div class="form-msg"></div>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 style="display:block; text-align:center;">Proses Data Tebar Benur</h4>
	<div class="button col-sm-4">
		<input type="radio" id="a25" name="check-substitution-2" value="detail" checked//>
		<label class="btn btn-primary" for="a25">Detail</label>
	</div>
	<div class="button col-sm-4">
		<input type="radio" id="a50" name="check-substitution-2" value="edit"/>
		<label class="btn btn-warning" for="a50">Edit</label>
	</div>
	<div class="button col-sm-4">
		<div class="buttons konfirmasiHapus-benur" data-id="<?php echo $dataBenur->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"> <label class="btn btn-danger" for="a50">hapus</label>
			<!-- <input type="radio" id="a50" name="check-substitution-2" value="hapus"/> -->

		</div>
	</div>


	<div id="detail">
		<form method="POST" id="form-proses-benur">
			<input type="hidden" name="id" value="<?php echo $dataBenur->id; ?>">
		<label for="Alamat" class="col-md-12 bg-primary ">Data Petambak</label>
		<div class="col-sm-4">
			<div class="form-group form-group-sm">
				<label for="Alamat">Alamat</label>
				<div class="form-control" >
					<?php echo $dataBenur->alamat; ?>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group form-group-sm">
				<label for="register">Register</label>
				<div class="form-control" >
					<?php echo $dataBenur->register; ?>

				</div>
			</div>
		</div>

		<div class="col-sm-4">
			<div class="form-group form-group-sm">
				<label for="nama">Nama</label>
				<div class="form-control" >
					<?php echo $dataBenur->nama; ?>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group form-group-sm">
				<label for="namaPendaftar">Nama Pendaftar</label>
				<div class="form-control" >
					<?php echo $dataBenur->namaPendaftar; ?>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group form-group-sm" style="width: 100%;">
				<label for="agen">AGEN</label>
				<div class="form-control" >
					AGEN <?php echo $dataBenur->nama_agen; ?>
				</div>
			</div>
		</div>

		<div class="col-sm-4">
			<div class="form-group form-group-sm">
				<label for="noHp">No Hp</label>
				<div class="form-control" >
					<?php echo $dataBenur->noHp; ?>
				</div>
			</div>
		</div>
		<label for="Alamat" class="col-sm-12 bg-primary ">Data Tebar Benur</label>
		<div class="col-sm-4">
			<div class="form-group form-group-sm">
				<label for="jenis">Jenis Benur</label>
				<div class="form-control" >
					<?php echo $dataBenur->jnsBenur; ?>
				</div>
			</div>
		</div>


		<div class="col-sm-4">
			<div class="form-group form-group-sm">
				<label for="harga">Harga Benur</label>
				<div class="form-control" >
					<?php echo $dataBenur->harga; ?>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group form-group-sm">
				<label for="kantong">Perkantong</label>
				<div class="form-control" >
					<?php echo $dataBenur->kantong; ?>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group form-group-sm">
				<label for="jmlBenur">Jumlah Tebar Benur</label>
				<div class="form-control" >
					<?php echo $dataBenur->jmlBenur; ?>
				</div>
			</div>
		</div>

		<div class="col-sm-4">
			<div class="form-group form-group-sm">
				<label for="jmlKantong">Jumlah kantong</label>
				<div class="form-control" >
					<?php echo $dataBenur->jmlKantong; ?>

				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group form-group-sm">
				<label for="tglSchedule" >Tanggal Tebar</label>
				<div class="form-control" >
					<?php echo time_convert($dataBenur->tglSchedule);  ?>

				</div>
			</div>
		</div>

		<div class="col-sm-6">
			<label class="text-center" for="dp">Total</label>
			<div class="form-group form-group-sm">
				<div class="form-control bg-danger" >
					Rp. <?php echo angka_indo($dataBenur->biaya); ?>

				</div>
			</div>
		</div>

		<div class="col-sm-6">
			<label class="text-center" for="dp">Pembayaran DP</label>
			<div class="form-group form-group-sm">
				<div class="form-control" >
					Rp. <?php echo angka_indo($dataBenur->dp); ?>

				</div>
			</div>
		</div>


		<div class="form-group form-group-sm">
				<div class="col-sm-12">
					<button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Proses</button>
				</div>
		</div>
		</form>
	</div>
	<div id="edit" style="display: none;">
		<form method="POST" id="form-proses-benur">
			<input type="hidden" name="id" value="<?php echo $dataBenur->id; ?>">


			<label for="Alamat" class="col-md-12 bg-red ">Data Petambak</label>


			<div class="col-sm-4">
				<div class="form-group form-group-sm">
					<label for="Alamat">Alamat</label>
					<input type="text" class="form-control" placeholder="Alamat" name="alamat" id="alamat" aria-describedby="sizing-addon2" value="<?php echo $dataBenur->alamat; ?>" onkeyup="isi_otomatis()">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group form-group-sm">
					<label for="register">Register</label>
					<input type="text" class="form-control" placeholder="Register" name="register" id="register" aria-describedby="sizing-addon2" value="<?php echo $dataBenur->register; ?>">
				</div>
			</div>

			<div class="col-sm-4">
				<div class="form-group form-group-sm">
					<label for="nama">Nama</label>
					<input type="text" class="form-control" placeholder="Nama" name="nama" id="nama" aria-describedby="sizing-addon2" value="<?php echo $dataBenur->nama; ?>">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group form-group-sm">
					<label for="namaPendaftar">Nama Pendaftar</label>
					<input type="text" class="form-control" placeholder="namaPendaftar" name="namaPendaftar" aria-describedby="sizing-addon2" value="<?php echo $dataBenur->namaPendaftar; ?>">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group form-group-sm" style="width: 100%;">
					<label for="agen">AGEN</label>
					<select name="idAgen" class="form-group form-control select2 " aria-describedby="sizing-addon2" style="width: 100%;">
						<option value="0">
							Pilih Nama Agen
						</option>
						<?php
						foreach ($dataAgen as $agen) {
							?>
							<option value="<?php echo $agen->id; ?>"  <?php if($agen->id == $dataBenur->idAgen){echo "selected='selected'";} ?>>
								AGEN <?php echo $agen->nama; ?>
							</option>
							<?php
						}
						?>
					</select>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="form-group form-group-sm">
					<label for="noHp">No Hp</label>
					<input type="text" class="form-control" name="noHp" placeholder="Nomor Telepon" aria-describedby="sizing-addon2" value="<?php echo $dataBenur->noHp; ?>">
				</div>
			</div>
			<label for="Alamat" class="col-sm-12 bg-red ">Data Tebar Benur</label>
			<div class="col-sm-4">
				<div class="form-group form-group-sm">
					<label for="jenis">Jenis Benur</label>
					<select name="jnsBenur" id="jnsBenur" class="form-group form-control select2 " aria-describedby="sizing-addon2" style="width: 100%;">
						<option data-harga="0" data-kantong="0" value="0">
							Pilih Jenis Benur
						</option>
						<?php
						foreach ($dataJenisBenur as $jenis) {
							?>
							<option data-harga="<?php echo $jenis->harga; ?>" data-kantong="<?php echo $jenis->jumlah; ?>" value="<?php echo $jenis->kode; ?>" <?php if($jenis->kode == $dataBenur->jnsBenur){echo "selected='selected'";} ?>>
								<?php echo $jenis->nama; ?>
							</option>
							<?php
						}
						?>
					</select>
				</div>
			</div>


			<div class="col-sm-4">
				<div class="form-group form-group-sm">
					<label for="harga">Harga Benur</label>
					<input type="text" class="form-control" placeholder="harga" name="harga" id="harga" aria-describedby="sizing-addon2" value="<?php echo $dataBenur->harga; ?>" onkeyup="sum();">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group form-group-sm">
					<label for="kantong">Perkantong</label>
					<input type="text" class="form-control" placeholder="kantong" name="kantong" id="kantong"aria-describedby="sizing-addon2" value="<?php echo $dataBenur->kantong; ?>" onkeyup="sum(); ribuan_ketik('kantong');">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group form-group-sm">
					<label for="jmlBenur">Jumlah Tebar Benur</label>
					<input type="text" class="form-control" placeholder="jmlBenur" name="jmlBenur" id="jmlBenur" aria-describedby="sizing-addon2" value="<?php echo $dataBenur->jmlBenur; ?>" onkeyup=" sum_kantong(); ribuan_ketik('jmlBenur');">
				</div>
			</div>

			<div class="col-sm-4">
				<div class="form-group form-group-sm">
					<label for="jmlKantong">Jumlah kantong</label>
					<input type="text" class="form-control" placeholder="jmlKantong" name="jmlKantong" id="jmlKantong"aria-describedby="sizing-addon2" value="<?php echo $dataBenur->jmlKantong; ?>" onkeyup="sum();">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group form-group-sm">
					<label for="tglSchedule" >Tanggal Tebar</label>
					<div id="datepicker-group" class="input-group date" data-date-format="dd-mm-yyyy">
						<input class="form-control" name="tglSchedule" type="text" placeholder="DD-MM-YYYY" value="<?php echo time_convert($dataBenur->tglSchedule); ?>"/>
						<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
					</div>
				</div>
			</div>
			<input type="hidden" class="form-control" placeholder="Total Biaya" name="biaya" id="biaya" aria-describedby="sizing-addon2" value="<?php echo angka_indo($dataBenur->biaya); ?>">
			<div class="col-sm-6">
				<label class="text-center" for="dp">Total</label>
				<div class="form-group form-group-sm">
					<input type="text" class="form-control" placeholder="Total" name="biayatampil" id="biayatampil" aria-describedby="sizing-addon2" value="Rp. <?php echo angka_indo($dataBenur->biaya); ?>" onkeyup="ribuan_ketik('biaya','Rp. ');" disabled>
				</div>
			</div>

			<div class="col-sm-6">
				<label class="text-center" for="dp">Pembayaran DP</label>
				<div class="form-group form-group-sm">
					<input type="text" class="form-control" placeholder="Pembayaran DP" name="dp" id="dp" aria-describedby="sizing-addon2" value="Rp. <?php echo angka_indo($dataBenur->dp); ?>" onkeyup="ribuan_ketik('dp','Rp. ');">
				</div>
			</div>


			<div class="form-group form-group-sm">
				<div class="col-sm-12">
					<button type="submit" class="form-control btn bg-red"> <i class="glyphicon glyphicon-ok"></i> Proses</button>
				</div>
			</div>

		</form>
	</div>
</div>


<script type="text/javascript">
	$('input[type="radio"]').click(function () {
		var inputValue = $(this).attr("value");
		if (inputValue == "edit") {
			$("#detail").hide();
			$("#edit").show();
		} else {
			$("#edit").hide();
			$("#detail").show();
		}
	});

	$(document).ready(function() {
		$("#datepicker-group").datepicker({
			format: "dd M yyyy",
			todayHighlight: true,
			autoclose: true,
			clearBtn: true
		});
	});


	$(function(){
		$(".select2").select2({
			theme: "bootstrap"}); 


	});

	function isi_otomatis(){
		var alamat = $("#alamat").val();
		if(alamat.length >= 6){
			$.ajax({
				url: 'benur/proses_ajax',
				data:"alamat="+alamat ,
			}).success(function (data) {
				var json = data,
				obj = JSON.parse(json);
				$('#nama').val(obj.nama);
				$('#register').val(obj.register);
				$('#alamat').val(obj.alamat);
			});
		} else{
			$('#nama').val('');
			$('#register').val('');
		}

	}


	function sum() {
		var txtFirstNumberValue = document.getElementById('kantong').value;
		var txtSecondNumberValue = document.getElementById('jmlKantong').value;
		var txtThrerdNumberValue = document.getElementById('harga').value;
		var result = (txtFirstNumberValue.replace(/[^,\d]/g, '').toString()) * (txtSecondNumberValue.replace(/[^,\d]/g, '').toString());
		var result2 = result * (txtThrerdNumberValue.replace(/[^,\d]/g, '').toString());
		if (!isNaN(result)) {
			document.getElementById('jmlBenur').value = ribuan(result);
		}
		if (!isNaN(result2)) {
			document.getElementById('biaya').value = ribuan(result2,'Rp. ');
			document.getElementById('biayatampil').value = ribuan(result2,'Rp. ');
			
			$('#total').text(ribuan(result2,'Rp. '));
		}
	}

	function sum_kantong() {

		var txtFirstNumberValue = document.getElementById('jmlBenur').value;
		var txtSecondNumberValue = document.getElementById('kantong').value;
		var txtThrerdNumberValue = document.getElementById('harga').value;
		var result = (txtFirstNumberValue.replace(/[^,\d]/g, '').toString()) / (txtSecondNumberValue.replace(/[^,\d]/g, '').toString());
		var result2 = (txtFirstNumberValue.replace(/[^,\d]/g, '').toString()) * (txtThrerdNumberValue.replace(/[^,\d]/g, '').toString());
		if (!isNaN(result)) {
			document.getElementById('jmlKantong').value = (result);
		}
		if (!isNaN(result2)) {

			document.getElementById('biaya').value = result2;
			$('#total').text(ribuan(result2,'Rp. '));
		}
	}

	$('#jnsBenur').on('change', function(){
          // ambil data dari elemen option yang dipilih
		const harga = $('#jnsBenur option:selected').data('harga');
		const kantong = $('#jnsBenur option:selected').data('kantong');

          // tampilkan data ke element
		$('[name=harga]').val(harga);
		$('[name=kantong]').val(ribuan(kantong));
		sum_kantong();

	});



	function ribuan_ketik(id, cur) {
		var rupiah = document.getElementById(id);
		rupiah.addEventListener('keyup', function(e){
              // tambahkan 'Rp.' pada saat form di ketik
              // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, cur);
		});
	}

        /* Fungsi formatRupiah */
	function formatRupiah(angka, prefix){
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
		split       = number_string.split(','),
		sisa        = split[0].length % 3,
		rupiah        = split[0].substr(0, sisa),
		ribuan        = split[0].substr(sisa).match(/\d{3}/gi);

              // tambahkan titik jika yang di input sudah menjadi angka ribuan
		if(ribuan){
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}
		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
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

</script>
