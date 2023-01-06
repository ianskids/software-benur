<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
     <div class="col-md-3">
       <button class="form-control btn btn-primary tambah-benur" data-toggle="modal"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
    
    <div class="col-md-3">
        <a href="<?php echo base_url('Benur/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
    <div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-benur"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
    </div>
     <div class="col-md-3 bg-red form-group">
      <h4 class="text-center bg-red">Total Benur <?php echo angka_indo($sum[0]['jmlBenur']); ?> ekor</h4>

  </div>
  </div>

  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Alamat</th>
          <th>Register</th>
          <th>Nama</th>
          <th>jnsBenur</th>
          <th>jmlBenur</th>
          <th>nama_agen</th>
          <th>dp</th>
          <th>No hp</th>
          <th>Tanggal Daftar</th>
          <th>Tanggal Tebar</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-benur">
        
      </tbody>
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
  //benur
    function tampilBenur() {
    $.get('<?php echo base_url('Benur/tampil_proses'); ?>', function(data) {
      MyTable.fnDestroy();
      $('#data-benur').html(data);
      refresh();
    });
  }

  var id_benur;

  $(document).on("click", ".tambah-benur", function() {
        
    $.ajax({
      method: "POST",
      url: "<?php echo base_url('Benur/tambah'); ?>",
    })
    .done(function(data) {
      $('#tempat-modal').html(data);
      $('#tambah-benur').modal('show');
    })
  })

  $(document).on('submit', '#form-tambah-benur', function(e){
    var data = $(this).serialize();
    $.ajax({
      method: 'POST',
      url: '<?php echo base_url('Benur/prosesTambah'); ?>',
      data: data
    })
    .done(function(data) {
      var out = jQuery.parseJSON(data);
      if (out.status == 'form') {
        $('.form-msg').html(out.msg);
        effect_msg_form();
      } else {
        document.getElementById("form-tambah-benur").reset();
        $('#tambah-benur').modal('hide');
        $('#konfirmasiPrint').modal('show');

        $(".print-dataBenur").click(function() {
          PopupCenter('<?php echo base_url('benur/print/'); ?>'+out.id, 'Print',720,450);
            $('#konfirmasiPrint').modal('hide');
            tampilBenur();
            $('.msg').html(out.msg);
            effect_msg();
            
        })
        $(document).on("click", ".btn-danger", function() {
          $('#konfirmasiPrint').modal('hide');
            tampilBenur();
            $('.msg').html(out.msg);
            effect_msg();
        })

      }
    })
    
    e.preventDefault();
  });


  
  $(document).on("click", ".proses-dataBenur", function() {
    var id = $(this).attr("data-id");
    
    $.ajax({
      method: "POST",
      url: "<?php echo base_url('Benur/proses'); ?>",
      data: "id=" +id
    })
    .done(function(data) {
      $('#tempat-modal').html(data);
      $('#update-benur').modal('show');
    })
  })

  $(document).on('submit', '#form-update-benur', function(e){
    var data = $(this).serialize();

    $.ajax({
      method: 'POST',
      url: '<?php echo base_url('Benur/prosesUpdate'); ?>',
      data: data
    })
    .done(function(data) {
      var out = jQuery.parseJSON(data);

      tampilBenur();
      if (out.status == 'form') {
        $('.form-msg').html(out.msg);
        effect_msg_form();
      } else {
        document.getElementById("form-update-benur").reset();
        $('#update-benur').modal('hide');
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
    var id = id_benur;
    
    $.ajax({
      method: "POST",
      url: "<?php echo base_url('Benur/delete'); ?>",
      data: "id=" +id
    })
    .done(function(data) {
      $('#konfirmasiHapus').modal('hide');
      tampilBenur();
      $('.msg').html(data);
      effect_msg();
    })
  })


  $('#tambah-benur').on('hidden.bs.modal', function () {
    $('.form-msg').html('');
  })

  $('#update-benur').on('hidden.bs.modal', function () {
    $('.form-msg').html('');
  })
</script>