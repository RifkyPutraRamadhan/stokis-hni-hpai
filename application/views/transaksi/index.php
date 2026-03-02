<div class="container mt-4 mb-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold text-success">
                <i class="fas fa-history me-2"></i> Riwayat Transaksi
            </h5>
            <div class="action-buttons">
                <a class="btn btn-export" href="<?= base_url('transaksi/export_excel'); ?>" target="_blank" role="button">
                    <i class="fas fa-file-excel me-1"></i> Export Excel
                </a>
            </div>
        </div>
        
        <div class="card-body">
            <?php if( $this->session->flashdata('flash') ) : ?>
                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                    <i class="fas fa-check-circle me-2"></i> Transaksi <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>
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
                            <th class="text-start">Pelanggan</th>
                            <th class="text-start">Item & Kategori</th>
                            <th>Qty</th>
                            <th>Status</th>
                            <?php if($this->session->userdata('id_role') == 2) : ?>
                                <th>Bantuan</th>
                            <?php endif; ?>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if( empty($transaksi) ) :?>
                            <tr>
                                <td colspan="<?= ($this->session->userdata('id_role') == 2) ? '7' : '6'; ?>" class="text-center py-5">
                                    <span class="text-muted">Belum ada riwayat transaksi</span>
                                </td>
                            </tr>
                        <?php endif; ?>
                        
                        <?php $i=1; foreach( $transaksi as $tra ) : ?>
                            <tr>
                                <td class="text-center fw-bold text-muted"><?= $i++; ?></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm me-2 bg-success text-white rounded-circle d-flex align-items-center justify-content-center fw-bold">
                                            <?= substr($tra['nama'], 0, 1); ?>
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark"><?= $tra['nama']; ?></div>
                                            <small class="text-muted" style="font-size: 11px;"><?= $tra['id_member']; ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-bold text-dark"><?= $tra['produk']; ?></div>
                                    <small class="badge bg-light text-success border"><?= $tra['kategori']; ?></small>
                                </td>
                                <td class="text-center fw-bold"><?= $tra['kuantitas']; ?></td>
                                <td class="text-center">
                                    <?php if($tra['status']==1) : ?>
                                        <span class="badge badge-status bg-warning text-dark">Diproses</span>
                                    <?php elseif($tra['status']==2) : ?>
                                        <span class="badge badge-status bg-info text-white">Diterima</span>
                                    <?php elseif($tra['status']==3) : ?>
                                        <span class="badge badge-status bg-success text-white">Selesai</span>
                                    <?php endif; ?>
                                </td>

                                <?php if($this->session->userdata('id_role') == 2) : ?>
                                    <td class="text-center">
                                        <?php if($tra['status']==2) : 
                                            $wa_url = 'https://api.whatsapp.com/send?phone=6285811367152&text=' . urlencode("Halo, saya ingin menanyakan pesanan atas nama ".$tra['nama']. " (".$tra['id_member'].")");
                                        ?>
                                            <a href="<?= $wa_url; ?>" target="_blank" class="btn btn-sm btn-outline-success rounded-pill px-3">
                                                <i class="fab fa-whatsapp"></i> Hubungi
                                            </a>
                                        <?php else: ?>
                                            <span class="text-muted">-</span>
                                        <?php endif; ?>
                                    </td>
                                <?php endif; ?>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <a href="<?= base_url('transaksi/detail/').$tra['id']; ?>" class="btn btn-action btn-detail" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <a href="<?= base_url('transaksi/ubah/').$tra['id']; ?>" class="btn btn-action btn-edit" title="<?= ($this->session->userdata('id_role') == 1) ? 'Konfirmasi' : 'Ubah'; ?>">
                                            <i class="fas <?= ($this->session->userdata('id_role') == 1) ? 'fa-check-circle' : 'fa-edit'; ?>"></i>
                                        </a>

                                        <button type="button" class="btn btn-action btn-delete" data-bs-toggle="modal" data-bs-target="#delModal-<?= $tra['id']; ?>" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>

                                    <div class="modal fade" id="delModal-<?= $tra['id']; ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0 shadow">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fw-bold">Hapus Transaksi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body py-4 text-center">
                                                    <p class="mb-0">Yakin ingin menghapus riwayat pesanan <br><strong>"<?= $tra['nama']; ?>"</strong>?</p>
                                                </div>
                                                <div class="modal-footer border-0 justify-content-center">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                                    <a href="<?= base_url('transaksi/hapus/').$tra['id']; ?>" class="btn btn-danger px-4">Hapus</a>
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