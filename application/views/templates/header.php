<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url('assets/system-image/logo-hni-hpai.png'); ?>" />
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center fw-bold" href="<?= base_url('dashboard'); ?>">
            <img src="<?= base_url('assets/system-image/logo-hni-hpai.png'); ?>" width="40" class="me-2">
            STOKIS HNI-HPAI
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav ms-auto">
                
                <?php if($this->session->userdata('id_role') == 1) : ?>
                    <a class="nav-link" href="<?= base_url("kategori"); ?>"><i class="fas fa-file-alt"></i> Data Kategori</a>
                    <a class="nav-link" href="<?= base_url("barang"); ?>"><i class="fas fa-box"></i> Data Barang</a>
                    <a class="nav-link" href="<?= base_url("transaksi"); ?>"><i class="fas fa-tasks me-1"></i> Kelola Transaksi</a>
                <?php endif; ?>

                <?php if($this->session->userdata('id_role') == 2) : ?>
                    <a class="nav-link" href="<?= base_url("barang"); ?>"><i class="fas fa-shopping-cart"></i> Order Barang</a>
                    <a class="nav-link" href="<?= base_url("transaksi"); ?>"><i class="fas fa-history"></i> Riwayat Transaksi</a>
                <?php endif; ?>

                <a class="nav-link" href="<?= base_url("profil"); ?>"><i class="fas fa-user-circle"></i> Akun Saya</a>
                
                <a class="nav-link" href="#" id="mode-gelap"></a>
                
                <a href="<?= base_url('auth/logout'); ?>" class="btn btn-dark btn-logout-custom">
                    <i class="fas fa-sign-out-alt me-1"></i> Logout
                </a>
            </div>
        </div>
    </div>
</nav>