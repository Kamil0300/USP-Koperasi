  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?= $tittle ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('pegawai/dashboard') ?>">Home</a></li>
          <li class="breadcrumb-item active"><?php echo $tittle ?></li>
        </ol>
      </nav>
    </div>
    <section class="section">
      <div class="row">
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
            <h5>Laproan Berdasarkan Nama</h5>
             <form action="<?= base_url('pegawai/DataPinjaman/aksi_transaksi_pinjaman') ?>" method="POST">
               <select class="form-select select2" style="width: 100%;" name="nama" >
                    <option hidden value="">--Pilih Nama--</option>
                      <?php foreach ($nama as $n) { ?>
                    <option value="<?php echo $n->nama ?>"><?php echo $n->nama ?></option>
                      <?php } ?>
                </select>
                <br>
                <button type="submit" class="btn btn-primary">Filter</button>
             </form>
            </div>
          </div>
          </div> 
        <div class="col-lg-4">
          <div class="card mb-3">
            <div class="card-body">
              <h5>Laproan Berdasarkan Bulan Tahun</h5>
             <form action="<?= base_url('pegawai/DataPinjaman/thnbln') ?>" method="POST">
               <select class="form-select select2" style="width: 100%;" name="tahun_peminjaman" >
                    <option hidden value="">--Tahun--</option>
                      <?php foreach ($tahun as $t) { ?>
                    <option value="<?php echo $t->tahun ?>"><?php echo $t->tahun ?></option>
                      <?php } ?>
                </select>
                <select class="form-select select2" style="width: 100%;" name="bulan_peminjaman" >
                    <option hidden value="">--Bulan--</option>
                    <option value="01">Januari</option>
                    <option value="02">Febuari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
                <br>
                <button type="submit" class="btn btn-primary">Filter</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
    <div class="card">
      <form action="" id="simpananpk">
            <div class="card-body">
            <h5 class="card-title">Riwayat Transaksi Pinjaman</h5>
            
    <table class="table datatable" id="result">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">NAK</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jumlah Pinjamam</th>
                    <th scope="col">Tenggang Waktu(bln)</th>
                    <th scope="col">Tanggal Peminjaman</th>
                  
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
                      <td><?php echo $p->tenggang_wkt ?> /bln</td>
                      <td><?php echo $p->tgl_pinjaman ?></td>
                      
                    </tr>

            </select>
                  <?php } ?>
                </tbody>
                </thead>
              </table>
            </form>
            </div>
          </div>
          </div>
      </div>
      </script>
    </section>

  </main><!-- End #main -->