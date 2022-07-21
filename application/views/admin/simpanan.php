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
              <br>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">Simpanan Wajib</h4>
                <p>Anggota melakukan simpanan wajib setiap bulan nya sebesar Rp.50.000</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
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
                    
                    <th scope="col">OPSI</th>
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
                      
                      <td><a href="<?php echo base_url('admin/DataSimpanan/tambah_datawjb/'.$a->nak) ?>" class="btn btn-outline-success"><i class="bi bi-pencil-fill"></i>Simpanan Wajib </a></td>
                    </tr>
                  <?php } ?>
                </thead>                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->