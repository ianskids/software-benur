<?php
  $no = 1;
  foreach ($dataBenur as $benur) {
    ?>
    <tr>
      <td ><?php echo $no; ?></td>
      <td ><?php echo $benur->alamat; ?></td>
      <td><?php echo $benur->register; ?></td>
      <td><?php echo $benur->nama; ?></td>
      <td><?php echo $benur->jnsBenur; ?></td>
      <td><?php echo angka_indo($benur->jmlBenur); ?></td>
      <td><?php echo $benur->nama_agen; ?></td>
      <td><?php echo angka_indo($benur->dp, 'Rp. '); ?></td>
      <td><?php echo $benur->noHp; ?></td>
      <td><?php echo time_convert($benur->tglDaftar); ?></td>
      <td><?php echo time_convert($benur->tglSchedule); ?></td>
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataBenur" data-id="<?php echo $benur->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-benur" data-id="<?php echo $benur->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>
