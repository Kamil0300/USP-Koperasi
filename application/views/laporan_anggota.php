<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Validasi Penerima Bantuan</title>
    <style>
    table tr .text2 {
        text-align: center;
        font-size: 17px;
    }

    table tr td {
        font-size: 14px;
    }

    table tr .text {
        text-align: right;
        font-size: 13px;
    }
    </style>
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/css_print.css" type="text/css">
</head>

<body>
    <center>
        <table width="1020">
            <tr>
                <td>
                    <center>
                        <img src="<?= base_url('assets/'); ?>/img/logo-koperasi.png" width="110" height="110">
                    </center>
                </td>
                <td width="120"></td>
                <td style="float: left;">
                   <center>
                        <span class="title-header" style="font-weight: bold; text-transform: uppercase;">
                            KOPERASI KONSUMEN PEGAWAI BPR DAN LKM KABUPATEN TASIKMALAYA
                        </span><br>
                        <span class="title-header" style="font-weight: bold; text-transform: uppercase;">ARTHA MUKTI</span><br>
                        <small class="alamat">jln.RE.Djaelani(Komplek Ruki Mitra Mart) RT.006 RW.013 Kel.Cilembang Kec.Cihideung Phone. 02652350655 Kota Tasikmalaya</small>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <hr class="garis">
                </td>
            </tr>
        </table>
    </center>
    <p style="font-size: 17pt; text-align: center;"> LAPORAN ANGGOTA</p>
    <table border="1" align="center">
        <thead>
            <tr>
                	<th>No</th>
                    <th>NIK</th>
                    <th>NAK</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Jabatan</th>
                    <th>Dana Kematian</th>
                    <th>Simpanan Wajib</th>
                    <th>Simpanan Pokok</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                  $no=1;
                  foreach($anggota as $a) { ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $a->NIK ?></td>
                      <td><?php echo $a->nak ?></td>
                      <td><?php echo $a->nama ?></td>
                      <td><?php echo $a->tgl_lahir ?></td>
                      <td><?php echo $a->JK ?></td>
                      <td><?php echo $a->alamat ?></td>
                      <td><?php echo $a->jabatan ?></td>
                      <td><?php echo $a->dana_kematian ?></td>
                      <td><?php echo $a->simpanan_wajib ?></td>
                      <td><?php echo $a->simpanan_pokok ?></td>
                    </tr>
                  <?php } ?>
        </tbody>
    </table><br>
    <center>
        <table width="1020">
            <tr style="float: right; line-height: 1.5;">
                <td class="text2">Tasikmalaya, <?= date('d F Y') ?><br>
                    Ka.Bag, Unit Jasa <br><br><br><br><b><u>
                            Asep Kusdiman,A.Md</u></b>
                </td>
            </tr>
        </table>
    </center>
</body>

<script type="text/javascript">
window.print();
</script>

</html>