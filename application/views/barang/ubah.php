<?php $today = date('Y-m-d'); ?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-header bg-white py-3 border-0">
                    <h5 class="mb-0 fw-bold text-warning">
                        <i class="fas fa-edit me-2"></i>Ubah Data Produk
                    </h5>
                </div>
                
                <div class="card-body p-4">
                    <?= form_open_multipart('', ['id' => 'form-ubah-barang']);?>
                    <input type="hidden" name="id" value="<?= $barang['id']; ?>">
                    
                    <div class="row">
                        <div class="col-md-5 border-end">
                            <label class="form-label fw-bold text-muted small">FOTO PRODUK SAAT INI</label>
                            <div class="mb-3 text-center p-3 border rounded bg-light">
                                <img src="<?= base_url('assets/foto/') . $barang['foto']; ?>" 
                                     id="previewFoto" 
                                     class="img-fluid rounded shadow-sm mb-3" 
                                     style="max-height: 250px; object-fit: contain;"
                                     alt="Foto produk">
                                <div class="small text-muted mb-2">Nama file: <?= $barang['foto'] ?></div>
                                <input type="file" class="form-control custom-file-input" id="formFile" name="image" accept="image/*">
                                <div class="form-text text-danger"><?= form_error('image'); ?></div>
                            </div>

                            <div class="mb-3">
                                <label for="kode" class="form-label fw-bold text-muted small">KODE BARANG</label>
                                <input type="text" class="form-control" id="kode" name="kode" value="<?= $barang['kode']; ?>">
                                <div class="form-text text-danger"><?= form_error('kode'); ?></div>
                            </div>
                        </div>

                        <div class="col-md-7 ps-md-4">
                            <div class="mb-3">
                                <label for="kategori" class="form-label fw-bold text-muted small">KATEGORI</label>
                                <select class="form-select select-custom" id="kategori" name="kategori">
                                    <?php foreach( $kategori as $kat ) : ?>
                                        <option value="<?= $kat['id']; ?>" <?= ($kat['id'] == $barang['id_kategori']) ? 'selected' : ''; ?>>
                                            <?= $kat['kategori']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="produk" class="form-label fw-bold text-muted small">NAMA PRODUK</label>
                                <input type="text" class="form-control" id="produk" name="produk" value="<?= $barang['produk']; ?>">
                                <div class="form-text text-danger"><?= form_error('produk'); ?></div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="stok" class="form-label fw-bold text-muted small">STOK</label>
                                    <input type="number" class="form-control" id="stok" name="stok" value="<?= $barang['stok']; ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="harga" class="form-label fw-bold text-muted small">HARGA (RP)</label>
                                    <input type="number" class="form-control" id="harga" name="harga" value="<?= $barang['harga']; ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="dimensi_kualitas" class="form-label fw-bold text-muted small">DIMENSI KUALITAS</label>
                                    <input type="text" class="form-control" id="dimensi_kualitas" name="dimensi_kualitas" value="<?= $barang['dimensi_kualitas']; ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="berat_bersih" class="form-label fw-bold text-muted small">BERAT BERSIH</label>
                                    <input type="text" class="form-control" id="berat_bersih" name="berat_bersih" value="<?= $barang['berat_bersih']; ?>">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label fw-bold text-muted small">KETERANGAN</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3"><?= $barang['keterangan']; ?></textarea>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="tanggal_proses" value="<?= $today; ?>">

                    <hr class="my-4">

                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?= base_url("barang"); ?>" class="btn btn-light px-4">Batal</a>
                        <button type="submit" class="btn btn-warning px-5 fw-bold">
                            <i class="fas fa-check-circle me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>