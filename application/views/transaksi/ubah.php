<?php 
$today = date('Y-m-d');
?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3 border-0">
                    <h5 class="fw-bold text-dark mb-0">
                        <i class="fas <?= ($this->session->userdata('id_role') == 1) ? 'fa-check-double text-success' : 'fa-edit text-primary'; ?> me-2"></i>
                        <?= ($this->session->userdata('id_role') == 1) ? 'Konfirmasi Status Transaksi' : 'Ubah Data Transaksi'; ?>
                    </h5>
                </div>
                
                <div class="card-body p-4 p-lg-5">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $transaksi['id']; ?>">

                        <?php if($this->session->userdata('id_role') == 2) : ?>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">ID MEMBER</label>
                                    <input type="text" class="form-control" name="id_member" value="<?= $transaksi['id_member']; ?>" required>
                                    <div class="form-text text-danger"><?= form_error('id_member'); ?></div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">E-MAIL</label>
                                    <input type="email" class="form-control bg-light" name="email" value="<?= $transaksi['email']; ?>" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">NAMA PENERIMA</label>
                                    <input type="text" class="form-control" name="nama" value="<?= $transaksi['nama']; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">NO HANDPHONE</label>
                                    <input type="text" class="form-control" name="no_hp" value="<?= $transaksi['no_hp']; ?>">
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-bold">ALAMAT PENGIRIMAN</label>
                                    <textarea class="form-control" name="alamat" rows="2"><?= $transaksi['alamat']; ?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">PRODUK</label>
                                    <input type="text" class="form-control bg-light" value="<?= $transaksi['produk']; ?>" readonly>
                                    <input type="hidden" name="produk" value="<?= $transaksi['produk']; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">KUANTITAS</label>
                                    <input type="number" class="form-control bg-light" name="kuantitas" value="<?= $transaksi['kuantitas']; ?>" readonly>
                                </div>
                                <div class="col-12 text-center bg-light p-3 rounded-3 my-4">
                                    <span class="text-muted small d-block">Total yang harus dibayar</span>
                                    <h3 class="fw-bold text-success mb-0">Rp.<?= number_format($transaksi['total'], 0, ',', '.'); ?></h3>
                                    <input type="hidden" name="total" value="<?= $transaksi['total']; ?>">
                                    <input type="hidden" name="harga" value="<?= $transaksi['harga']; ?>">
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-bold">CATATAN TAMBAHAN</label>
                                    <textarea class="form-control" name="keterangan" rows="2"><?= $transaksi['keterangan']; ?></textarea>
                                </div>
                                <input type="hidden" name="status" value="<?= $transaksi['status']; ?>">
                                <input type="hidden" name="tanggal_transaksi" value="<?= $today; ?>">
                            </div>

                        <?php else : ?>
                            <div class="alert alert-info border-0 mb-4">
                                <p class="mb-1 small fw-bold">Informasi Pesanan:</p>
                                <ul class="mb-0 small">
                                    <li>Pelanggan: <strong><?= $transaksi['nama']; ?></strong></li>
                                    <li>Produk: <strong><?= $transaksi['produk']; ?> (x<?= $transaksi['kuantitas']; ?>)</strong></li>
                                    <li>Total Tagihan: <strong>Rp.<?= number_format($transaksi['total'], 0, ',', '.'); ?></strong></li>
                                </ul>
                            </div>

                            <input type="hidden" name="id_member" value="<?= $transaksi['id_member']; ?>">
                            <input type="hidden" name="email" value="<?= $transaksi['email']; ?>">
                            <input type="hidden" name="no_hp" value="<?= $transaksi['no_hp']; ?>">
                            <input type="hidden" name="nama" value="<?= $transaksi['nama']; ?>">
                            <input type="hidden" name="alamat" value="<?= $transaksi['alamat']; ?>">
                            <input type="hidden" name="produk" value="<?= $transaksi['produk']; ?>">
                            <input type="hidden" name="kuantitas" value="<?= $transaksi['kuantitas']; ?>">
                            <input type="hidden" name="harga" value="<?= $transaksi['harga']; ?>">
                            <input type="hidden" name="total" value="<?= $transaksi['total']; ?>">
                            <input type="hidden" name="keterangan" value="<?= $transaksi['keterangan']; ?>">
                            <input type="hidden" name="tanggal_transaksi" value="<?= $transaksi['tanggal_transaksi']; ?>">

                            <div class="mb-4">
                                <label for="status" class="form-label fw-bold">Update Status Transaksi</label>
                                <select class="form-select form-select-lg border-2 border-primary" id="status" name="status">
                                    <option value="1" <?= $transaksi['status'] == 1 ? 'selected' : ''; ?>>Diproses (Pending)</option>
                                    <option value="2" <?= $transaksi['status'] == 2 ? 'selected' : ''; ?>>Diterima (Siap Bayar/Ambil)</option>
                                    <option value="3" <?= $transaksi['status'] == 3 ? 'selected' : ''; ?>>Selesai (Lunas)</option>
                                </select>
                                <div class="form-text text-muted mt-2">
                                    <i class="fas fa-info-circle me-1"></i> Mengubah status ke <strong>Selesai</strong> berarti transaksi telah tuntas.
                                </div>
                            </div>
                        <?php endif; ?>

                        <hr class="my-4 opacity-25">

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="<?= base_url("transaksi"); ?>" class="btn btn-link text-muted text-decoration-none px-0">
                                <i class="fas fa-chevron-left me-1"></i> Batal & Kembali
                            </a>
                            <button type="submit" class="btn btn-dark px-5 shadow-sm fw-bold">
                                <?= ($this->session->userdata('id_role') == 1) ? 'Update Status' : 'Simpan Perubahan'; ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>