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
      <td><?php echo $benur->jnsBenur; ?></td>
      <td><?php echo angka_indo($benur->jmlBenur); ?></td>
      <td><?php echo angka_indo($benur->kantong); ?></td>
       <td><?php echo angka_indo($benur->kantong); ?></td>
      <td><?php echo angka_indo($benur->jmlKantong); ?></td>
      <td><?php echo $benur->nama_agen; ?></td>
      <td><?php echo time_convert($benur->tglSchedule); ?></td>
      <td>
        <button class="btn btn-warning detail-dataBenur" data-id="<?php echo $benur->id; ?>">Proses</button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>
