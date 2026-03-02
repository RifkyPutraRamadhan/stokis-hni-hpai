<section class="login-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card login-card">
          <div class="row g-0">
            <div class="col-md-5 login-img-container d-none d-md-flex">
              <img src="<?= base_url('assets/system-image/logo-hni-hpai.png'); ?>" alt="HNI Logo" class="login-img-side">
            </div>
            <div class="col-md-7">
              <div class="card-body p-4 p-lg-5">
                <div class="mb-4">
                  <h2 class="brand-text">DAFTAR STOKIS</h2>
                  <p class="text-muted">Buat akun baru untuk mengelola stokis HNI.</p>
                </div>
                <?php if($this->session->flashdata('message')) : ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('message'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  </div>
                <?php endif; ?>
                <form action="<?= base_url("register"); ?>" method="post">
                  <div class="mb-3">
                    <label class="form-label">Alamat Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan Email" value="<?= set_value('email'); ?>">
                    <?= form_error('email', '<small class="text-danger">', '</small>');?>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan username" value="<?= set_value('username'); ?>">
                    <?= form_error('username', '<small class="text-danger">', '</small>');?>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Kata Sandi</label>
                    <input type="password" name="password" class="form-password form-control" placeholder="Minimal 5 karakter">
                    <div class="form-check mt-2">
                      <input type="checkbox" class="form-check-input form-checkbox" id="showPassReg">
                      <label class="form-check-label" for="showPassReg"><small>Tampilkan Kata sandi</small></label>
                    </div>
                    <?= form_error('password', '<small class="text-danger">', '</small>');?>
                  </div>
                  <input type="hidden" name="id_role" value="2">
                  <input type="hidden" name="foto" value="default.jpg">
                  <div class="row g-2 mt-4">
                    <div class="col-6">
                        <a href="<?= base_url("auth"); ?>" class="btn btn-outline-secondary w-100 py-2">Kembali</a>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-hni w-100 py-2">Daftar Akun</button>
                    </div>
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