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
            <?php foreach ($pokok as $p) { ?>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Simpanan Pokok <?php echo $p->nama?></h5>

              <!-- General Form Elements -->
              <form action="<?php echo base_url('admin/DataSimpanan/proses_update_simpananpk')?>" method="POST">
                <div class="row mb-3">
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nak" hidden value="<?php echo $p->nak ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" hidden value="<?php echo $p->nama ?>">
                  </div>
                </div>
                 <div class="row mb-3">
                  
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" hidden name="jabatan">
                      <option value="Biasa" <?php if($p->jabatan == 'Biasa') echo 'selected' ?>>Biasa</option>
                      <option value="Biasa" <?php if($p->jabatan == 'Luar Biasa') echo 'selected' ?>>Luar Biasa</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="NIK" hidden value="<?php echo $p->NIK?>">
                  </div>
                </div>
                <div class="row mb-3">
                  
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px" hidden name="alamat"><?php echo $p->alamat?></textarea>
                  </div>
                </div>
                 <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Simpanan Pokok</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">Rp</span>
                    <input type="text" class="form-control" name="simpanan_pk">                  
                  </div>
                </div>
              </div>
                
                 <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Pembayaran</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="tgl_pembayaran" id="tgl_lahir">
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