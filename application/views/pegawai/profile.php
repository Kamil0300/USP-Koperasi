<main id="main" class="main">

    <div class="pagetitle">
      <h1><?php echo $tittle; ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="<?php echo site_url('assets/img/profile-img.jpg')?>" alt="Profile" class="rounded-circle">
              <h2><?php echo $this->session->userdata('nama')?></h2>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profile - <?php echo $this->session->userdata('nama')?></button>
                </li>
              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic">Bagian USP bertugas secara berinteraksi langsung terhadap anggota nya untuk melakukan suatu transaksi yaitu simpanan wajib dan peminjaman. USP juga yang menangani pendaftaran anggota baru.</p>

                  <h5 class="card-title">Info Login</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nama </div>
                    <div class="col-lg-9 col-md-8"><?php echo $this->session->userdata('nama')?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">E-mail</div>
                    <div class="col-lg-9 col-md-8"><?php echo $this->session->userdata('email')?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Status</div>
                    <?php if ($this->session->userdata('status') == '1') { ?>
                    <div class="col-lg-9 col-md-8"><span class="badge bg-success">aktif</div></span>
                    <?php }else{ ?>
                      <div class="col-lg-9 col-md-8"><span class="badge bg-danger">tidak aktif</div></span>
                    <?php } ?> 
                  </div>
                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                </div>

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->