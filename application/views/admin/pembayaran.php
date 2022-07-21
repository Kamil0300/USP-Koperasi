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
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">General Form Elements</h5>

              <!-- General Form Elements -->
              <?php foreach ($pembayaran as $p) { ?>
                <?php } ?>
              <form action="<?php echo base_url('admin/DataPinjaman/proses_input_pembayaran')?>" method="POST">
                <input type="text" class="form-control" name="id_pinjaman" value="<?php echo $p->id_pinjaman ?>" hidden>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" value="<?php echo $p->nama ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">NAK</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nak" value="<?php echo $p->nak ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">NIK</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="NIK" value="<?php echo $p->NIK ?>">
                  </div>
                </div>
                 
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Jumlah Bayar</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">Rp</span>
                    <input type="text" class="form-control" name="jumlah_bayar" value="<?php echo $p->bayar ?>"></div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Bulan ke-</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tenggang_wkt" placeholder="1...2...3...">
                  </div>
                </div>
              </div> 
              <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Bayar</label>
                  <div class="col-sm-10">
                    <input type="datetime-local" class="form-control" name="tgl_bayar" required="">
                  </div>
                </div> 
                
                                      
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Submit Button</label>
                  <div class="col-sm-10">
                    <button type="submit" value="tambah" class="btn btn-primary">Submit Form</button>
                  </div>
                </div>

              </form>
              
  </main><!-- End #main -->