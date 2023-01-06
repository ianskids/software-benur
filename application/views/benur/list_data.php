<?php
  $no = 1;
  foreach ($dataBenur as $benur) {
    ?>
    <tr>
      <td ><?php echo $no; ?></td>
      <td ><?php echo $benur->alamat; ?></td>
      <td><?php echo $benur->register; ?></td>
      <td style="min-width:230px;"><?php echo $benur->nama; ?></td>
      <td><?php echo $benur->jnsBenur; ?></td>
      <td><?php echo angka_indo($benur->jmlBenur); ?></td>
      <td><?php echo angka_indo($benur->kantong); ?></td>
      <td><?php echo angka_indo($benur->jmlKantong); ?></td>
      <td><?php echo $benur->nama_agen; ?></td>
      <td><?php echo time_convert($benur->tglSchedule); ?></td>
      <td style="min-width:230px;">
        <button class="btn btn-warning update-dataBenur btn-sm" data-id="<?php echo $benur->id; ?>">Detail</button>
       <!-- <button class="btn btn-primary btn-sm" onclick="PopupCenter('<?php echo base_url('benur/print/'.$benur->id); ?>', 'myPop1',720,450)" ><i class="glyphicon glyphicon-print"></i></button> -->
        <!-- <button class="btn btn-danger konfirmasiHapus-benur btn-sm" data-id="<?php echo $benur->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i></button> -->
      </td>
    </tr>
    <?php
    $no++;
  }
?>
