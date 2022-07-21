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
             <form action="<?= base_url('pegawai/DataSimpanan/nama') ?>" method="POST">
              
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
             <form action="<?= base_url('pegawai/DataSimpanan/thnbln') ?>" method="POST">
               <select class="form-select select2" style="width: 100%;" name="thn_simpananwjb" >
                    <option hidden value="">--Tahun--</option>
                      <?php foreach ($tahun as $t) { ?>
                    <option value="<?php echo $t->tahun ?>"><?php echo $t->tahun ?></option>
                      <?php } ?>
                </select>
                <select class="form-select select2" style="width: 100%;" name="bulan_simpananwjb" >
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
            <h5 class="card-title">Riwayat Transaksi Simpanan Pokok</h5>
            
    <table class="table datatable" id="result">
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
                  foreach($wajib as $w) { ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $w->nak ?></td>
                      <td><?php echo $w->nama ?></td>
                      <td><?php echo $w->jabatan ?></td>
                      <td><?php echo $w->NIK ?></td>
                      <td><?php echo $w->alamat ?></td>
                      <td><?php echo $w->simpanan_wjb ?></td>
                      <td><?php echo $w->tgl_pembayaran ?></td>
                      
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