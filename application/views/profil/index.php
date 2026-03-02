<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h4 class="fw-bold mb-4 text-dark"><i class="fas fa-user-circle me-2 text-success"></i>Profil Pengguna</h4>
            
            <?php if( $this->session->flashdata('flash') ) : ?>
                <div class="alert alert-success alert-dismissible fade show mb-4 border-0 shadow-sm" role="alert">
                    <i class="fas fa-check-circle me-2"></i> 
                    <strong><?= $this->session->flashdata('flash'); ?></strong> silakan <a class="fw-bold text-decoration-none" href="<?= base_url("auth/logout"); ?>">Login Ulang</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if( $this->session->flashdata('error') ) : ?>
                <div class="alert alert-danger alert-dismissible fade show mb-4 border-0 shadow-sm" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i> Perubahan <strong>Gagal!</strong> <?= $this->session->flashdata('error'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?= form_open_multipart('', ['class' => 'main-body']);?>
    <input type="hidden" name="id" value="<?= $this->session->userdata('id') ?>">
    
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm rounded-lg py-4">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <div class="profile-img-wrapper mb-3">
                            <img src="<?= base_url('assets/foto/') . $this->session->userdata('foto') ?>" 
                                 alt="User" class="rounded-circle shadow-sm" width="150" height="150">
                        </div>
                        <div class="mt-2">
                            <h5 class="fw-bold"><?= $this->session->userdata('username') ?></h5>
                            <span class="badge <?= ($this->session->userdata('id_role') == 1) ? 'bg-success' : 'bg-info' ?> mb-3 px-3">
                                <?= ($this->session->userdata('id_role') == 1) ? 'Administrator' : 'Tamu' ?>
                            </span>
                            <div class="px-3">
                                <label for="formFile" class="form-label small fw-bold text-muted">GANTI FOTO PROFIL</label>
                                <input type="file" class="form-control form-control-sm custom-file-input" id="formFile" name="image" accept="image/*">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-lg p-3">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-3 d-flex align-items-center">
                            <h6 class="mb-0 fw-bold">E-mail</h6>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control bg-light border-0" value="<?= $this->session->userdata('email') ?>" readonly>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-sm-3 d-flex align-items-center">
                            <h6 class="mb-0 fw-bold">Username</h6>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" name="username" class="form-control" value="<?= $this->session->userdata('username') ?>" required>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-sm-3 d-flex align-items-center">
                            <h6 class="mb-0 fw-bold">Password</h6>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="password" id="passwordField" name="password" class="form-control border-end-0" value="<?= $this->session->userdata('password') ?>" required>
                                <span class="input-group-text bg-white border-start-0 cursor-pointer" id="togglePassword">
                                    <i class="fas fa-eye text-muted"></i>
                                </span>
                            </div>
                            <div class="form-text mt-2">
                                <i class="fas fa-info-circle me-1"></i> Biarkan password tetap jika tidak ingin diubah.
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9 mt-2">
                            <button type="submit" class="btn btn-hni px-5 py-2 fw-bold shadow-sm">
                                <i class="fas fa-save me-2"></i>Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= form_close(); ?>
</div>