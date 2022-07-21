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
            <h5 class="card-title">Pembayaran</h5>
            <?php echo $this->session->flashdata('pesan')?>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">NAK</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jumlah Pinjaman</th> 
                    <th scope="col">Tanggal Peminjaman</th>
                    <th scope="col">Tenggang waktu(bln)</th>
                    <th scope="col">Bayar</th>
                    <th scope="col">Total Tagihan</th>
                    <th scope="col">Sisa Tagihan</th>
                    <th scope="col">OPSI</th>
                    <th scope="col">Invoice</th>
                  </tr>
                  <tbody>
                  <?php 
                  $no=1;
                  foreach($pinjaman as $p) { ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $p->nak ?></td>
                      <td><?php echo $p->NIK ?></td>
                      <td><?php echo $p->nama ?></td>
                      <td>Rp. <?php echo number_format($p->jumlah_pinjaman,0,',','.') ?></td>
                      <td><?php echo $p->tgl_pinjaman ?></td>
                      <td><?php echo $p->tenggang_wkt ?> Bulan</td>
                      <td>Rp. <?php echo number_format($p->bayar,0,',','.') ?> /bln</td>
                      <td>Rp. <?php echo number_format($p->total_pinjam,0,',','.') ?></td>
                      <td>Rp. <?php echo number_format($p->jumlah_pinjaman,0,',','.')?></td>
                      <td><?php if ($p->jumlah_pinjaman == 0) { ?>
                        <a href="<?php echo base_url('admin/DataPinjaman/pembayaran/'.$p->id_pinjaman)?>" class="btn btn-outline-warning" hidden><i class="bi bi-cash"></i> BAYAR</a><?php 
                      }else{ ?>
                          <a href="<?php echo base_url('admin/DataPinjaman/pembayaran/'.$p->id_pinjaman)?>" class="btn btn-outline-warning"><i class="bi bi-cash"></i> BAYAR</a>
                      <?php } ?>
                         | <a onclick="return confirm('Hapus Data Ini?')" href="<?php echo base_url('admin/DataPinjaman/hapus/'.$p->nak) ?>"class="btn btn-outline-danger"><i class="bi bi-trash-fil$p->jumlah_pinjaman/$p->tenggang_wktl"></i>DELETE</a> 
                         <td><a href="<?php echo base_url('admin/DataPinjaman/invoice/'.$p->id_pinjaman) ?>"class="btn btn-primary"><i class="bi bi-printer-fill"></i></i> Invoice</a></td>
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

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
            <h5 class="card-title">Riwayat Pembayaran</h5>
            <?php echo $this->session->flashdata('pesan')?>
            <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">NAK</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Bulan ke</th>
                    <th scope="col">Tanggal Pembayaran</th>
                    <th scope="col">Jumlah Bayar</th>
                    <th scope="col">OPSI</th>                     
                  </tr>
                  <tbody>
                  <?php 
                  $no=1;
                  foreach($total as $t) { ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $t->nak ?></td>
                      <td><?php echo $t->NIK ?></td>
                      <td><?php echo $t->nama ?></td>
                      <td><?php echo $t->tenggang_wkt ?></td>
                      <td><?php echo $t->tgl_bayar ?></td>
                      <td>Rp. <?php echo number_format($t->jumlah_bayar,0,',','.') ?></td>
                      <td><a onclick="return confirm('Hapus Data Ini?')" href="<?php echo base_url('admin/DataPinjaman/hapus_riwayat/'.$t->id_pembayaran) ?>"class="btn btn-outline-danger"><i class="bi bi-trash-fil$p->jumlah_pinjaman/$p->tenggang_wktl"></i>DELETE</a></td>
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