<?php

  foreach ($dataPetambak as $petambak) {
    ?>
    <tr>
      <td style="min-width:230px;"><?php echo $petambak->alamat; ?></td>
      <td><?php echo $petambak->register; ?></td>
      <td><?php echo $petambak->nama; ?></td>
      <td><?php echo $petambak->no_hp; ?></td>
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataPetambak" data-id="<?php echo $petambak->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-petambak" data-id="<?php echo $petambak->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
  }
?>