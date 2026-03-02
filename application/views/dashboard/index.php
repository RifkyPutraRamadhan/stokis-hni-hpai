<link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">

<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 text-center text-lg-start">
                <span class="badge rounded-pill bg-light text-success mb-3 px-3 py-2 fw-bold shadow-sm">PANEL KENDALI STOKIS</span>
                <h1 class="display-4 fw-bold">Halo, <strong><?= $this->session->userdata('username') ?></strong>!</h1>
                <p class="lead mb-4 opacity-90">Kelola ketersediaan barang dan pantau riwayat transaksi Anda dalam satu platform terpadu.</p>
                
                <div class="d-grid d-md-flex justify-content-center justify-content-lg-start gap-3">
                    <?php if($this->session->userdata('id_role') == 1) : ?>
                        <a href="<?= base_url("transaksi"); ?>" class="btn btn-hero shadow">
                            <i class="fas fa-clipboard-list me-2"></i> Kelola Transaksi Hari Ini
                        </a>
                        <a href="<?= base_url("barang"); ?>" class="btn btn-outline-light d-inline-flex align-items-center">
                            <i class="fas fa-box me-2"></i> 
                            <span>Stok Barang</span>
                        </a>
                    <?php else : ?>
                        <a href="<?= base_url("transaksi"); ?>" class="btn btn-hero shadow">
                            <i class="fas fa-history me-2"></i> Lihat Riwayat Pesanan
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<main id="main">
    <section id="resources" class="py-5">
        <div class="container">
            <div class="section-title mb-5">
                <h3 class="fw-bold text-dark">Pusat Informasi & Panduan</h3>
                <div class="title-line"></div>
            </div>

            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="resource-card">
                        <div class="card-icon">
                            <img src="<?= base_url('assets/system-image/brosur.jpg') ?>" class="rounded-circle shadow-sm">
                        </div>
                        <h5>Brosur Produk</h5>
                        <p>Informasi harga terbaru dan varian produk yang tersedia saat ini.</p>
                        <a href="<?= base_url('assets/pdf/brosur.pdf'); ?>" target="_blank" class="btn btn-sm btn-outline-success rounded-pill">
                            Lihat Brosur <i class="fas fa-external-link-alt ms-1"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="resource-card">
                        <div class="card-icon">
                            <img src="<?= base_url('assets/system-image/katalog.jpg') ?>" class="rounded-circle shadow-sm">
                        </div>
                        <h5>Katalog Lengkap</h5>
                        <p>Daftar lengkap produk beserta manfaat dan deskripsi detailnya.</p>
                        <a href="<?= base_url('assets/pdf/katalog.pdf'); ?>" target="_blank" class="btn btn-sm btn-outline-success rounded-pill">
                            Lihat Katalog <i class="fas fa-external-link-alt ms-1"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="resource-card">
                        <div class="card-icon">
                            <img src="<?= base_url('assets/system-image/panduan-sukses.jpg') ?>" class="rounded-circle shadow-sm">
                        </div>
                        <h5>Panduan Sukses</h5>
                        <p>Langkah-langkah strategis untuk mengoptimalkan penjualan Stokis Anda.</p>
                        <a href="<?= base_url('assets/pdf/panduan-sukses.pdf'); ?>" target="_blank" class="btn btn-sm btn-outline-success rounded-pill">
                            Lihat Panduan <i class="fas fa-external-link-alt ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>