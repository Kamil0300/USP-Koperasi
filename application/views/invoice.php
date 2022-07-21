<?php

?>
<!DOCTYPE html>
<html lang="en">
<title><?php echo $tittle; ?></title>

<head>
    <style type="text/css">
  body{background:#efefef;font-family:arial;}
  #wrapshopcart{width:70%;margin:3em auto;padding:30px;background:#fff;box-shadow:0 0 15px #ddd;}
  h1{margin:0;padding:0;font-size:2.5em;font-weight:bold;}
  p{font-size:1em;margin:0;}
  table{margin:2em 0 0 0; border:1px solid #eee;width:100%; border-collapse: separate;border-spacing:0;}
  table th{background:#fafafa; border:none; padding:20px ; font-weight:normal;text-align:left;}
  table td{background:#fff; border:none; padding:12px  20px; font-weight:normal;text-align:left; border-top:1px solid #eee;}
  table tr.total td{font-size:1.5em;}
  .btnsubmit{display:inline-block;padding:10px;border:1px solid #ddd;background:#eee;color:#000;text-decoration:none;margin:2em 0;}
  form{margin:2em 0 0 0;}
  label{display:inline-block;width:auto;}
  input[type=text]{border:1px solid #bbb;padding:10px;width:30em;}
  textarea{border:1px solid #bbb;padding:10px;width:30em;height:5em;vertical-align:text-top;margin:0.3em 0 0 0;}
  .submitbtn{font-size:1.5em;display:inline-block;padding:10px;border:1px solid #ddd;background:#eee;color:#000;text-decoration:none;margin:0.5em 0 0 8em;};
  
  </style>
 </head>
 
 <body>
  <div id="wrapshopcart">
   <h1>Invoice</h1>
   <p>Silahkan save halaman ini ... </p>
   <?php foreach ($print as $p) { ?>
   <h3>Berikut adalah data lengkap Anda : </h3>
   <label>Nama lengkap  : <?php echo $p->nama ?> </label><br />
   <label>Nomor Anggota Koperasi  : <?php echo $p->nak ?> </label><br />
   <label>NIK : <?php echo $p->NIK ?></label><br />
    
   
   <h3>Total Detail Pinjaman </h3>
   <label>Bayar Bulan ke :</label>
   <table>
    <tr><th width="70%">Uang Diterima</th><th width="10%">Tenggang Waktu</th><th width="10%">Pajak</th><th width="20%">Jumlah Bayar</th></tr>
    
     <tr><td>Rp. <?php echo number_format($p->jumlah_pinjaman,0,',','.')?></td><td><?php echo $p->tenggang_wkt?> bulan</td><td>1.5%<td>Rp. <?php echo number_format($p->bayar,0,',','.'); ?>/bln</td></tr>

    
    <tr class="total"><td></td><td >Total Tagihan</td><td>Rp. <?php echo number_format($p->total_pinjam,0,',','.')?></td></tr>
   </table> <?php } ?>  
   
   <h3>Silahkan Lakukan Pembayaran</h3>
   <p> </p>
   
   
  </div>
 </body>
</html>