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
                  <h2 class="brand-text">LUPA PASSWORD</h2>
                  <p class="text-muted">Masukkan email anda untuk mereset kata sandi</p>
                </div>

                <?php if($this->session->flashdata('success_pw')) : ?>
                  <div class="alert alert-success" role="alert">
                    <?= $this->session->flashdata('success_msg'); ?> 
                    <br><strong><?= $this->session->flashdata('success_pw'); ?></strong>
                  </div>
                <?php endif; ?>

                <?php if($this->session->flashdata('error_msg')) : ?>
                  <div class="alert alert-danger" role="alert">
                    <?= $this->session->flashdata('error_msg'); ?>
                  </div>
                <?php endif; ?>

                <form action="<?= base_url("register/forgot_password"); ?>" method="post">
                  <div class="mb-3">
                    <label class="form-label">Alamat E-mail</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukan email terdaftar" value="<?= set_value('email'); ?>">
                    <?= form_error('email', '<small class="text-danger">', '</small>');?>
                  </div>
                  <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-hni">Reset Password</button>
                    <a href="<?= base_url("auth"); ?>" class="btn btn-outline-secondary">Kembali ke Login</a>
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