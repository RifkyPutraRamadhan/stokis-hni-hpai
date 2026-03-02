<div class="container mt-4 mb-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold text-success">
                <i class="fas fa-box-open me-2"></i>
                <?= ($this->session->userdata('id_role') == 1) ? 'Data Barang' : 'Order Barang'; ?>
            </h5>
            <div class="action-buttons">
                <?php if($this->session->userdata('id_role') == 1) : ?>
                    <a class="btn btn-add" href="<?= base_url('barang/tambah'); ?>" role="button">
                        <i class="fas fa-plus-circle me-1"></i> Tambah Barang
                    </a>
                <?php endif; ?>
                <a class="btn btn-export" href="<?= base_url('barang/export_excel'); ?>" target="_blank" role="button">
                    <i class="fas fa-file-excel me-1"></i> Export Excel
                </a>
            </div>
        </div>
        
        <div class="card-body">
            <?php if( $this->session->flashdata('flash') ) : ?>
                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                    <i class="fas fa-check-circle me-2"></i> Data barang <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            
            <?php if( $this->session->flashdata('error') ) : ?>
                <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i> Data barang <strong>Gagal!</strong> <?= $this->session->flashdata('error'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <form action="" method="post" class="row g-2 mb-4">
                <div class="col-md-6 col-lg-4">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Cari kata kunci..." name="keyword" autocomplete="off">
                        <button class="btn btn-search" type="submit" name="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr class="text-center">
                            <th width="50">No</th>
                            <th width="120">Foto</th>
                            <th class="text-start">Informasi Produk</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th width="220">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if( empty($barang) ) :?>
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <span class="text-muted">Data Barang Tidak Ditemukan</span>
                                </td>
                            </tr>
                        <?php endif; ?>
                        
                        <?php $i=1; foreach( $barang as $bar ) : ?>
                            <tr>
                                <td class="text-center fw-bold text-muted"><?= $i++; ?></td>
                                <td class="text-center">
                                    <div class="img-container shadow-sm rounded">
                                        <img src="<?= base_url('assets/foto/') . $bar['foto']; ?>" class="img-fluid rounded" alt="Produk">
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-bold text-dark"><?= $bar['produk']; ?></div>
                                    <small class="badge bg-light text-success border"><?= $bar['kategori']; ?></small>
                                </td>
                                <td class="text-center">
                                    <span class="fw-bold <?= ($bar['stok'] <= 5) ? 'text-danger' : 'text-dark'; ?>">
                                        <?= $bar['stok']; ?>
                                    </span>
                                </td>
                                <td class="text-center fw-bold text-success">
                                    Rp.<?= number_format($bar['harga'], 0, ',', '.'); ?>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <a href="<?= base_url('barang/detail/'); ?><?= $bar['id']; ?>" class="btn btn-action btn-detail" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <?php if($this->session->userdata('id_role') == 2) : ?>
                                            <?php if($bar['stok'] > 0) : ?>
                                                <a href="<?= base_url('transaksi/tambah/'); ?><?= $bar['id']; ?>" class="btn btn-action btn-order" title="Pesan">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            <?php else : ?>
                                                <button class="btn btn-action btn-disabled" disabled title="Stok Habis">
                                                    <i class="fas fa-times-circle"></i>
                                                </button>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if($this->session->userdata('id_role') == 1) : ?>
                                            <a href="<?= base_url('barang/ubah/'); ?><?= $bar['id']; ?>" class="btn btn-action btn-edit" title="Ubah">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-action btn-delete" data-bs-toggle="modal" data-bs-target="#delModal-<?= $bar['id']; ?>" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        <?php endif; ?>
                                    </div>

                                    <div class="modal fade" id="delModal-<?= $bar['id']; ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered text-start">
                                            <div class="modal-content border-0 shadow">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fw-bold">Hapus Barang</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body py-4 text-center">
                                                    <p class="mb-0">Yakin ingin menghapus produk <br><strong>"<?= $bar['produk']; ?>"</strong>?</p>
                                                </div>
                                                <div class="modal-footer border-0 justify-content-center">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                                    <a href="<?= base_url('barang/hapus/'); ?><?= $bar['id']; ?>" class="btn btn-danger px-4">Hapus</a>
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