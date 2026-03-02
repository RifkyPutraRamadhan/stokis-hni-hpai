<div class="container mt-4 mb-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold text-success"><i class="fas fa-tags me-2"></i>Data Kategori</h5>
            <div class="action-buttons">
                <a class="btn btn-add" href="<?= base_url('kategori/tambah'); ?>" role="button">
                    <i class="fas fa-plus-circle me-1"></i> Tambah Kategori
                </a>
                <a class="btn btn-export" href="<?= base_url('kategori/export_excel'); ?>" target="_blank" role="button">
                    <i class="fas fa-file-excel me-1"></i> Export Excel
                </a>
            </div>
        </div>
        
        <div class="card-body">
            <?php if( $this->session->flashdata('flash') ) : ?>
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    <i class="fas fa-check-circle me-2"></i> Kategori <strong>Berhasil!</strong> <?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <form action="" method="post" class="row g-2 mb-4">
                <div class="col-md-6 col-lg-4">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Cari kata kunci..." name="keyword" autocomplete="off" required>
                        <button class="btn btn-search" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th width="80" class="text-center">No</th>
                            <th>Nama Kategori</th>
                            <th width="200" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if( empty($Kategori) ) :?>
                            <tr>
                                <td colspan="3" class="text-center py-5">
                                    <img src="<?= base_url('assets/img/no-data.svg'); ?>" width="100" class="mb-3 d-block mx-auto" alt="">
                                    <span class="text-muted">Data Kategori Tidak Ditemukan</span>
                                </td>
                            </tr>
                        <?php endif; ?>
                        
                        <?php $i=1; foreach( $Kategori as $kat ) : ?>
                            <tr>
                                <td class="text-center fw-bold text-muted"><?= $i++; ?></td>
                                <td class="fw-semibold"><?= $kat['kategori']; ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('kategori/ubah/'); ?><?= $kat['id']; ?>" class="btn btn-action btn-edit me-1" title="Ubah">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-action btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal-<?= $kat['id']; ?>" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                    <div class="modal fade text-start" id="deleteModal-<?= $kat['id']; ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0 shadow">
                                                <div class="modal-header border-0">
                                                    <h5 class="modal-title fw-bold">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body py-4">
                                                    <div class="text-center mb-3 text-danger">
                                                        <i class="fas fa-exclamation-triangle fa-3x"></i>
                                                    </div>
                                                    <p class="text-center mb-0">Apakah Anda yakin ingin menghapus kategori <br><strong>"<?= $kat['kategori']; ?>"</strong>?</p>
                                                </div>
                                                <div class="modal-footer border-0 justify-content-center pb-4">
                                                    <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Batal</button>
                                                    <a href="<?= base_url('kategori/hapus/'); ?><?= $kat['id']; ?>" class="btn btn-danger px-4">Hapus Sekarang</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>