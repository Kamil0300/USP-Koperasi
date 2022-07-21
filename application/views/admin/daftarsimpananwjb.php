  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?php echo $tittle ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
          <li class="breadcrumb-item active"><?php echo $tittle ?></li>
        </ol>
      </nav>
    </div>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
            <h5 class="card-title">Riwayat Transaksi Simpanan Wajib</h5>
            <?php echo $this->session->flashdata('pesan')?>
            <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">NAK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Simpanan Wajib</th>
                    <th scope="col">Tanggal Pembayaran</th>
                  
                  </tr>
                  <tbody>
                  <?php 
                  $no=1;
                  foreach($pokok as $p) { ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $p->nak ?></td>
                      <td><?php echo $p->nama ?></td>
                      <td><?php echo $p->jabatan ?></td>
                      <td><?php echo $p->NIK ?></td>
                      <td><?php echo $p->alamat ?></td>
                      <td><?php echo $p->simpanan_wjb ?></td>
                      <td><?php echo $p->tgl_pembayaran ?></td>
                      <td><a onclick="return confirm('Hapus Data Ini?')" href="<?php echo base_url('admin/DataSimpanan/hapus_simpananwjb/'.$p->id_wjb) ?>"class="btn btn-outline-danger"><i class="bi bi-trash-fill"></i>DELETE</a>
                    </tr>
                  <?php } ?>
                </tbody>
                </thead>
              </table>
            </div>
          </div>
          </div>
      </div>
    </section>

  </main><!-- End #main -->