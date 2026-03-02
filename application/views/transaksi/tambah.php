<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <?php if ($this->session->flashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <?= $this->session->flashdata('error'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('flash')) : ?>
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    Data Transaksi <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="card border-0 shadow-sm rounded-lg overflow-hidden">
                <div class="row g-0">
                    <div class="col-md-4 bg-light d-flex flex-column align-items-center justify-content-center p-4 border-end">
                        <h6 class="text-muted fw-bold mb-3">PRODUK DIPILIH</h6>
                        <img src="<?= base_url('assets/foto/') . $barang['foto']; ?>" class="img-fluid rounded shadow-sm mb-3" style="max-height: 250px; object-fit: cover;">
                        <h5 class="fw-bold text-center mb-1"><?= $barang['produk']; ?></h5>
                        <p class="text-success fw-bold">Rp.<?= number_format($barang['harga'], 0, ',', '.'); ?></p>
                        <span class="badge bg-white text-dark border px-3 py-2 fw-normal"><?= $barang['kategori']; ?></span>
                        
                        <div class="mt-3 small text-muted">
                            <i class="fas fa-boxes me-1"></i> Stok Tersedia: <strong><?= $barang['stok']; ?></strong>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card-body p-4 p-lg-5">
                            <legend class="fw-bold mb-4">Tambah Data Transaksi</legend>
                            
                            <form action="" method="post">
                                <input type="hidden" name="foto" value="<?= $barang['foto']; ?>">
                                <input type="hidden" name="status" value="1">
                                <input type="hidden" id="total" name="total" value="<?= $barang['harga']; ?>">
                                <input type="hidden" name="tanggal_transaksi" value="<?= date('Y-m-d'); ?>">

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="id_member" class="form-label small fw-bold">ID MEMBER <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="id_member" name="id_member" placeholder="Masukkan ID Member" value="<?= set_value('id_member'); ?>" required>
                                        <div class="form-text text-danger"><?= form_error('id_member'); ?></div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="email" class="form-label small fw-bold">E-MAIL</label>
                                        <input type="email" class="form-control bg-light" id="email" name="email" value="<?= $this->session->userdata('email') ?>" readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="nama" class="form-label small fw-bold">NAMA LENGKAP</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama penerima" value="<?= set_value('nama'); ?>">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="no_hp" class="form-label small fw-bold">NO HANDPHONE</label>
                                        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="08xxx" value="<?= set_value('no_hp'); ?>">
                                    </div>

                                    <div class="col-12">
                                        <label for="alamat" class="form-label small fw-bold">ALAMAT PENGIRIMAN</label>
                                        <textarea class="form-control" id="alamat" name="alamat" rows="2" placeholder="Alamat lengkap..."><?= set_value('alamat'); ?></textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="kuantitas" class="form-label small fw-bold">KUANTITAS</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="kuantitas" name="kuantitas" min="1" max="<?= $barang['stok']; ?>" value="1">
                                            <span class="input-group-text bg-white">Unit</span>
                                        </div>
                                        <div class="form-text text-danger"><?= form_error('kuantitas'); ?></div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">ESTIMASI TOTAL</label>
                                        <div class="form-control border-0 bg-success-subtle text-success fw-bold h5 mb-0" id="display-total">
                                            Rp.<?= number_format($barang['harga'], 0, ',', '.'); ?>
                                        </div>
                                        <input type="hidden" id="harga" value="<?= $barang['harga']; ?>">
                                    </div>

                                    <div class="col-12">
                                        <label for="keterangan" class="form-label small fw-bold">KETERANGAN TAMBAHAN</label>
                                        <textarea class="form-control" id="keterangan" name="keterangan" rows="2" placeholder="Catatan pesanan..."><?= set_value('keterangan'); ?></textarea>
                                    </div>
                                </div>

                                <div class="mt-5 d-flex gap-2">
                                    <a href="<?= base_url("barang"); ?>" class="btn btn-light px-4">Kembali</a>
                                    <button type="button" class="btn btn-dark px-4 flex-grow-1 fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#confirmModal">
                                        Proses Transaksi
                                    </button>
                                </div>

                                <div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content border-0 shadow">
                                            <div class="modal-header border-0 pb-0">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center py-4">
                                                <div class="mb-3">
                                                    <i class="fas fa-shopping-cart text-primary fa-3x"></i>
                                                </div>
                                                <h5 class="fw-bold">Konfirmasi Transaksi?</h5>
                                                <p class="text-muted">Sistem akan memvalidasi stok dan menyimpan pesanan Anda. Lanjutkan?</p>
                                            </div>
                                            <div class="modal-footer border-0 justify-content-center pb-4">
                                                <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary px-4 shadow-sm">Ya, Simpan Transaksi</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>