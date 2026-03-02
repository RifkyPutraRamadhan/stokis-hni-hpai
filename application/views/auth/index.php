<section class="login-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card login-card">
          <div class="row g-0">
            
            <div class="col-md-5 login-img-container d-none d-md-flex">
              <img src="<?= base_url('assets/system-image/logo-hni-hpai.png'); ?>" 
                   alt="HNI Logo" class="login-img-side">
            </div>

            <div class="col-md-7">
              <div class="card-body p-4 p-lg-5">
                
                <div class="mb-5">
                  <h2 class="brand-text">STOKIS HNI-HPAI</h2>
                  <p class="text-muted">Selamat datang kembali! Silakan masuk ke akun Anda.</p>
                </div>

                <?php if($this->session->flashdata('message')) : ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('message'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  </div>
                <?php endif; ?>

                <form method="post" action="<?= base_url('auth/index');?>">
                  
                  <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
                    <?= form_error('username', '<small class="text-danger">', '</small>');?>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Kata Sandi</label>
                    <input type="password" name="password" class="form-password form-control" placeholder="••••••••" required>
                    <div class="form-check mt-2">
                      <input type="checkbox" class="form-check-input form-checkbox" id="showPass">
                      <label class="form-check-label" for="showPass"><small>Tampilkan Kata sandi</small></label>
                    </div>
                    <?= form_error('password', '<small class="text-danger">', '</small>');?>
                  </div>

                  <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-hni">Masuk Sekarang</button>
                  </div>

                  <div class="text-center mt-4">
                    <p class="mb-1"><small>Lupa kredensial? <a href="<?= base_url("register/forgot_password"); ?>" class="text-link">Klik di sini</a></small></p>
                    <p><small>Belum punya akses? <a href="<?= base_url("register"); ?>" class="text-link">Daftar di sini</a></small></p>
                  </div>

                  <div class="text-center mt-5">
                    <span class="footer-copy">© <?= date('Y'); ?> STOKIS HNI - HPAI</span>
                  </div>

                </form>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>