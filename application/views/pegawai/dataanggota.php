  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?php echo $tittle ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
          <li class="breadcrumb-item active"><?php echo $tittle ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
            <h5 class="card-title">Data Anggota</h5>
            <a href="<?= base_url('pegawai/laporan_anggota/laporan_anggota'); ?>" class="btn btn-outline-success">
               <i class="fas fa-print"></i> Print
            </a>
            <?php echo $this->session->flashdata('pesan')?>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIK</th>
                    <th scope="col">NAK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Dana Kematian</th>
                    <th scope="col">Simpanan Wajib</th>
                    <th scope="col">Simpanan Pokok</th>
                  </tr>
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
                </thead>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>
  </main><!-- End #main -->