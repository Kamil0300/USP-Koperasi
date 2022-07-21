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
              <?php foreach ($anggota as $a) { ?>
              <form action="<?php echo base_url('admin/DataAnggota/proses_update_data')?>" method="POST">
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="NIK" value="<?php echo $a->NIK ?>" hidden>
                </div>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nak" value="<?php echo $a->nak ?>" hidden>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" value="<?php echo $a->nama ?>">
                  </div>
                </div>
                 <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="tgl_lahir" value="<?php echo $a->tgl_lahir ?>">
                  </div>
                </div>
                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="JK" value="L" <?php if($a->JK == 'L') echo 'checked'?>>
                      <label class="form-check-label" for="gridRadios1">
                        L
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="JK" value="P" <?php if($a->JK == 'P') echo 'checked'?>>
                      <label class="form-check-label" for="gridRadios2">
                        P
                      </label>
                    </div>
                  </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px" name="alamat"><?php echo $a->alamat ?></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Jabatan</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="jabatan">
                      <option value="Biasa" <?php if($a->jabatan == 'Biasa') echo 'selected' ?>>Biasa</option>
                      <option value="Luar Biasa" <?php if($a->jabatan == 'Luar Biasa') echo 'selected' ?>>Luar Biasa</option>
                    </select>
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