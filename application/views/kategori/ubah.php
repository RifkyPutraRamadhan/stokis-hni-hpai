<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-header bg-white py-3 border-0">
                    <h5 class="mb-0 fw-bold text-warning">
                        <i class="fas fa-edit me-2"></i>Ubah Nama Kategori
                    </h5>
                </div>
                
                <div class="card-body p-4">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $kategori['id'];?>">

                        <div class="mb-4">
                            <label for="kategori" class="form-label fw-bold text-muted small">NAMA KATEGORI</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-tag text-warning"></i>
                                </span>
                                <input type="text" 
                                       class="form-control border-start-0 ps-0" 
                                       id="kategori" 
                                       name="kategori" 
                                       placeholder="Nama kategori..."
                                       value="<?= $kategori['kategori'];?>"
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
                            <button type="submit" name="ubah" class="btn btn-warning px-4 fw-bold shadow-sm">
                                <i class="fas fa-check-circle me-1"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-center mt-3">
                <small class="text-muted italic">ID Kategori: #<?= $kategori['id']; ?></small>
            </div>
        </div>
    </div>
</div>