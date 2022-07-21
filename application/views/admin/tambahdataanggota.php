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
              <h5 class="card-title">Form tambah data anggota</h5>

              <!-- General Form Elements -->
              <form action="<?php echo base_url('admin/DataAnggota/proses_tambah_data')?>" method="POST">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">NIK</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="NIK" id="NIK">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-10">
                    <input hidden type="text" class="form-control" name="nak" value="NAK-<?php echo sprintf("%03s", $nak)?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" id="nama">
                  </div>
                </div>
                 <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir">
                  </div>
                </div>
                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="JK" id="gridRadios1" value="L" checked>
                      <label class="form-check-label" for="gridRadios1">
                        L
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="JK" id="gridRadios2" value="P">
                      <label class="form-check-label" for="gridRadios2">
                        P
                      </label>
                    </div>
                  </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px" name="alamat"></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Jabatan</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="jabatan">
                      <option>Biasa</option>
                      <option>Luar Biasa</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Dana Kematian</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">Rp</span>
                    <input type="text" class="form-control" name="dana_kematian" value="50000">
                  </div>
                </div>
              </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Simpanan Wajib</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">Rp</span>
                    <input type="text" class="form-control" name="simpanan_wajib" value="50000">
                  </div>
                </div>
              </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Simpanan Pokok</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">Rp</span>
                    <input type="text" class="form-control" name="simpanan_pokok" value="50000">
                  </div>
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