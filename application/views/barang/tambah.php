<?php 
$today = date('Y-m-d');
?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-header bg-white py-3 border-0">
                    <h5 class="mb-0 fw-bold text-success">
                        <i class="fas fa-plus-circle me-2"></i>Tambah Data Barang Baru
                    </h5>
                </div>
                
                <div class="card-body p-4">
                    <?= form_open_multipart('barang/tambah', ['id' => 'form-tambah-barang']);?>
                    
                    <div class="row">
                        <div class="col-md-6 border-end">
                            <div class="mb-3">
                                <label for="formFile" class="form-label fw-bold text-muted small">FOTO PRODUK</label>
                                <input type="file" class="form-control custom-file-input" id="formFile" name="image" accept="image/*" required>
                                <div class="form-text text-danger"><?= form_error('image'); ?></div>
                            </div>

                            <div class="mb-3">
                                <label for="kode" class="form-label fw-bold text-muted small">KODE BARANG</label>
                                <input type="text" class="form-control" id="kode" name="kode" placeholder="Contoh: HNI-001" value="<?= set_value('kode'); ?>">
                                <div class="form-text text-danger"><?= form_error('kode'); ?></div>
                            </div>

                            <div class="mb-3">
                                <label for="kategori" class="form-label fw-bold text-muted small">KATEGORI</label>
                                <select class="form-select select-custom" id="kategori" name="kategori">
                                    <option value="" selected disabled>Pilih Kategori</option>
                                    <?php foreach( $kategori as $kat ) : ?>
                                        <option value="<?= $kat['id']; ?>"><?= set_select('kategori', $kat['id']); ?> <?= $kat['kategori']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="form-text text-danger"><?= form_error('kategori'); ?></div>
                            </div>

                            <div class="mb-3">
                                <label for="produk" class="form-label fw-bold text-muted small">NAMA PRODUK</label>
                                <input type="text" class="form-control" id="produk" name="produk" placeholder="Masukkan nama produk" value="<?= set_value('produk'); ?>">
                                <div class="form-text text-danger"><?= form_error('produk'); ?></div>
                            </div>
                        </div>

                        <div class="col-md-6 ps-md-4">
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label for="stok" class="form-label fw-bold text-muted small">STOK AWAL</label>
                                    <input type="number" class="form-control" id="stok" name="stok" placeholder="0" value="<?= set_value('stok'); ?>">
                                    <div class="form-text text-danger"><?= form_error('stok'); ?></div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="harga" class="form-label fw-bold text-muted small">HARGA (RP)</label>
                                    <input type="number" class="form-control" id="harga" name="harga" placeholder="0" value="<?= set_value('harga'); ?>">
                                    <div class="form-text text-danger"><?= form_error('harga'); ?></div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="dimensi_kualitas" class="form-label fw-bold text-muted small">DIMENSI KUALITAS</label>
                                <input type="text" class="form-control" id="dimensi_kualitas" name="dimensi_kualitas" placeholder="Contoh: Premium/Grade A" value="<?= set_value('dimensi_kualitas'); ?>">
                            </div>

                            <div class="mb-3">
                                <label for="berat_bersih" class="form-label fw-bold text-muted small">BERAT BERSIH (GR/ML)</label>
                                <input type="text" class="form-control" id="berat_bersih" name="berat_bersih" placeholder="Contoh: 250gr" value="<?= set_value('berat_bersih'); ?>">
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label fw-bold text-muted small">KETERANGAN</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Tambahkan deskripsi singkat..."><?= set_value('keterangan'); ?></textarea>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="tanggal_proses" value="<?= $today; ?>">

                    <hr class="my-4 shadow-sm">

                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?= base_url("barang"); ?>" class="btn btn-light px-4">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-add px-5">
                            <i class="fas fa-save me-1"></i> Simpan Barang
                        </button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>