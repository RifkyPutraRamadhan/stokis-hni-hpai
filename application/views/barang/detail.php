    <link rel="stylesheet" href="<?= base_url('assets/style.css'); ?>">

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-5 mb-4">
            <div class="card border-0 shadow-sm p-3 rounded-lg sticky-top" style="top: 20px;">
                <div class="detail-image-wrapper">
                    <img src="<?= base_url('assets/foto/'). $barang['foto']; ?>" 
                         alt="<?= $barang['produk']; ?>" 
                         class="img-fluid rounded shadow-sm w-100">
                </div>
                <div class="mt-3 p-2">
                    <h5 class="fw-bold text-dark mb-1"><?= $barang['produk']; ?></h5>
                    <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2">
                        <i class="fas fa-tag me-1"></i> <?= $barang['kategori']; ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="detail-info-box shadow-sm mb-4">
                <h4 class="detail-title"><i class="fas fa-info-circle me-2 text-success"></i>Deskripsi Produk</h4>
                <p class="description-text"><?= !empty($barang['keterangan']) ? $barang['keterangan'] : 'Tidak ada deskripsi tambahan untuk produk ini.'; ?></p>
            </div>

            <div class="detail-info-box shadow-sm">
                <h4 class="detail-title"><i class="fas fa-list-ul me-2 text-success"></i>Spesifikasi Lengkap</h4>
                
                <div class="specs-list">
                    <div class="spec-item">
                        <span class="label">Kode Produk</span>
                        <span class="value fw-bold text-dark"><?= $barang['kode']; ?></span>
                    </div>
                    <div class="spec-item">
                        <span class="label">Dimensi Kualitas</span>
                        <span class="value"><?= $barang['dimensi_kualitas']; ?></span>
                    </div>
                    <div class="spec-item">
                        <span class="label">Berat Bersih</span>
                        <span class="value"><?= $barang['berat_bersih']; ?></span>
                    </div>
                    <div class="spec-item">
                        <span class="label">Stok Tersedia</span>
                        <span class="value <?= ($barang['stok'] > 0) ? 'text-success' : 'text-danger'; ?> fw-bold">
                            <?= $barang['stok']; ?> Unit
                        </span>
                    </div>
                    <div class="spec-item">
                        <span class="label">Tanggal Input</span>
                        <span class="value"><?= date('d F Y', strtotime($barang['tanggal_proses'])); ?></span>
                    </div>
                    <div class="spec-item no-border">
                        <span class="label">Harga Satuan</span>
                        <span class="value h4 fw-bold text-success mb-0">Rp.<?= number_format($barang['harga'], 0, ',', '.'); ?></span>
                    </div>
                </div>

                <div class="mt-4 pt-3 border-top d-flex gap-2">
                    <a href="<?= base_url('barang'); ?>" class="btn btn-outline-secondary px-4">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                    <?php if($this->session->userdata('id_role') == 1) : ?>
                        <a href="<?= base_url('barang/ubah/').$barang['id']; ?>" class="btn btn-warning px-4 fw-bold">
                            <i class="fas fa-edit me-2"></i>Ubah Data
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>