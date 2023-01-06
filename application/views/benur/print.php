<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $dataBenur->alamat; ?> - <?php echo strtoupper($dataBenur->namaPendaftar); ?> <?php echo $dataBenur->nama_agen?'- AGEN '.$dataBenur->nama_agen :""; ?></title>
</head>
<style type="text/css">
/* Kode CSS Untuk PAGE ini dibuat oleh http://jsfiddle.net/2wk6Q/1/ */
    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        font: 11pt "Cambria";
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 5mm 20mm;
        margin: 10mm auto;
        border: 1px #ffffff solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
        border: 0px solid;
        height: 257mm;
        outline: 2cm #ffffff solid;
    }
    .tengah {text-align : center;line-height: 5px;}
    .table_header {border-bottom : 5px solid #000; padding: 2px;width: 100%;}
    @page {
        size: A4;
        margin: 0;
    }
    @media print {
        html, body {
            width: 210mm;
            height: 148mm;        
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
</style>
<body onload="javascript:window.print()" onafterprint="window.close()" onfocus="window.close()">
<div class="book">
    <div class="page">
        <div class="subpage">
               <table class="table_header">
                     <tr>
                           <td class = "tengah"> <img src="<?php echo base_url(); ?>assets/img/KPPM.png" width="80px"> </td>
                           <td class = "tengah" style="padding-top: 22px;">
                                 <h2>KOPERASI PLASMA PRATAMA MANDIRI</h2>
                                 <h3>DESA BUMI PRATAMA MANDIRA</h3>
                                 <h4>KEC.SUNGAI MENANG KAB.OGAN KOMERING ILIR</h4>
                           </td>
                      </tr>
                      <tr>
                           <td class = "tengah"  colspan="2">
                                 <i style="font-size: small;">Email : koperasiplasma@gmail.com. BH : 106/BH/VII.S/D.PPK/IX/2011.Hp :081373048666</i>
                           </td>
                      </tr>
               </table >
                       <h3 class=tengah >INVOICE</h3>

<p>Pembeli : <?php echo strtoupper($dataBenur->namaPendaftar); ?> <?php echo $dataBenur->nama_agen?'- AGEN '.$dataBenur->nama_agen :""; ?></p>
                       <table style="    margin-left: 30px;">
                           <tr>
                               <td style="width: 30%;">Alamat</td>
                               <td style="width: 5%;">:</td>
                               <td style="width: 65%;"><?php echo $dataBenur->alamat; ?></td>
                               <td style="width: 65%;"><?php echo $dataBenur->alamat; ?></td>
                           </tr>
                           <tr>
                               <td style="width: 30%;">No Register</td>
                               <td style="width: 5%;">:</td>
                               <td style="width: 65%;"><?php echo $dataBenur->register; ?></td>
                           </tr>
                           <tr>
                               <td style="width: 30%; vertical-align: top;">Nama Petambak</td>
                               <td style="width: 5%; vertical-align: top;">:</td>
                               <td style="width: 65%;"><?php echo $dataBenur->nama; ?></td>
                           </tr>
                           <tr>
                               <td style="width: 30%;">No Hp</td>
                               <td style="width: 5%;">:</td>
                               <td style="width: 65%;"><?php echo $dataBenur->noHp; ?></td>
                           </tr>
                           <tr>
                               <td style="width: 30%;">Jumlah Benur</td>
                               <td style="width: 5%;">:</td>
                               <td style="width: 65%;"><?php echo angka_indo($dataBenur->jmlBenur); ?></td>
                           </tr>
                           <tr>
                               <td style="width: 30%;">Tanggal Tebar</td>
                               <td style="width: 5%;">:</td>
                               <td style="width: 65%;"><?php echo time_convert($dataBenur->tglSchedule); ?></td>
                           </tr>
                           <tr>
                               <td style="width: 30%;">Jumlah Tagihan</td>
                               <td style="width: 5%;">:</td>
                               <td style="width: 65%;">Rp. <?php echo angka_indo($dataBenur->biaya); ?></td>
                           </tr>
                          
                       </table>

                       <p>Terbilang : <?php echo terbilang($dataBenur->biaya); ?></p>

                       <div style="width: 50%; text-align: left; float: right;">Bumi Pratama Mandira, <?php echo date('d F Y');?> </div><br>
                       <div style="width: 50%; text-align: left; float: right;">Team Benur,</div><br><br><br><br><br>
                       <div style="width: 50%; text-align: left; float: right;"><?php echo $userdata->nama; ?></div>

        </div>    
    </div>
</div>
</body>
</html>