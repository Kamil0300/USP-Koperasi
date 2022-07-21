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
              <h5 class="card-title">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">Validasi data pinjaman</h4>
                <p>Pinjaman dipotong provisi sebesar 1%</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <!-- General Form Elements -->
              <?php foreach ($pinjaman as $a) { ?>
              <form action="<?php echo base_url('admin/DataPinjaman/proses_input_pinjaman')?>" method="POST">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" value="<?php echo $a->nama ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">NAK</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nak" value="<?php echo $a->nak ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">NIK</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="NIK" value="<?php echo $a->NIK ?>">
                  </div>
                </div>
                 
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Jumlah Pinjaman</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">Rp</span>
                    <input type="text" class="form-control" name="jumlah_pinjaman" required="" placeholder="max pinjaman Rp.25.000.000..."></div>
                </div>
              </div> 
              <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tenggang Waktu(bulan)</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tenggang_wkt" required="" placeholder="max tenggang waktu 36bln...">
                  </div>
                </div>
              <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Pinjaman</label>
                  <div class="col-sm-10">
                    <input type="datetime-local" class="form-control" name="tgl_pinjaman" required="">
                  </div>
                </div> 
                
                                      
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Submit Button</label>
                  <div class="col-sm-10">
                    <button type="submit" value="tambah" class="btn btn-primary">Submit Form</button>
                  </div>
                </div>

              </form>
              <?php } ?>
  </main><!-- End #main -->