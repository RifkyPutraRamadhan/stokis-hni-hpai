<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-header bg-white py-3 border-0">
                    <h5 class="mb-0 fw-bold text-success">
                        <i class="fas fa-tag me-2"></i>Tambah Kategori Baru
                    </h5>
                </div>
                
                <div class="card-body p-4">
                    <form action="" method="post">
                        <div class="mb-4">
                            <label for="kategori" class="form-label fw-bold text-muted small">NAMA KATEGORI</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-list text-muted"></i>
                                </span>
                                <input type="text" 
                                       class="form-control border-start-0 ps-0" 
                                       id="kategori" 
                                       name="kategori" 
                                       placeholder="Contoh: Herba, Kosmetik, dll"
                                       value="<?= set_value('kategori'); ?>"
                                       required>
                            </div>
                            <div class="form-text text-danger mt-1 small">
                                <?= form_error('kategori'); ?>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                            <a href="<?= base_url("kategori"); ?>" class="btn btn-light px-4 text-muted fw-semibold">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-add px-4">
                                <i class="fas fa-save me-1"></i> Simpan Kategori
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="alert alert-info border-0 shadow-sm mt-4 rounded-lg" role="alert">
                <div class="d-flex">
                    <i class="fas fa-info-circle mt-1 me-3 text-info"></i>
                    <small class="text-dark">
                        Pastikan nama kategori belum pernah terdaftar sebelumnya untuk menghindari duplikasi data.
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>