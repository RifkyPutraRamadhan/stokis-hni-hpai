<div class="container mt-5 mb-5">
    <div class="row g-4">
        <div class="col-md-5">
    <div class="card border-0 shadow-sm overflow-hidden h-100">
                <div class="d-flex align-items-center justify-content-center bg-white p-3" style="min-height: 400px;">
                    <img src="<?= base_url('assets/foto/'). $transaksi['foto']; ?>" 
                        class="img-fluid rounded" 
                        alt="<?= $transaksi['produk']; ?>"
                        style="max-height: 450px; width: auto; object-fit: contain;"> 
                        </div>

                <div class="card-body p-4 bg-light border-top">
                    <h5 class="fw-bold mb-1 text-dark"><?= $transaksi['produk']; ?></h5>
                    <span class="badge bg-dark fw-normal mb-3"><?= $transaksi['kategori']; ?></span>
                    
                    <?php if($this->session->userdata('id_role') == 2) : ?>
                        <div class="alert alert-info border-0 shadow-sm small mb-0 py-3">
                            <div class="d-flex">
                                <i class="fas fa-info-circle me-2 mt-1"></i>
                                <span>
                                    <?php if($transaksi['status']==1) : ?>
                                        Pesanan sedang diproses. Mohon tunggu konfirmasi Admin.
                                    <?php elseif($transaksi['status']==2) : ?>
                                        <strong>Pesanan diizinkan!</strong> Silakan klik tombol WhatsApp di samping untuk koordinasi pengambilan/pengiriman.
                                    <?php elseif($transaksi['status']==3) : ?>
                                        Pesanan selesai. Terima kasih telah berbelanja di Stokis HNI-HPAI.
                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card border-0 shadow-sm p-4 h-100">
                <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                    <h4 class="fw-bold text-dark mb-0">Rincian Transaksi</h4>
                    <div class="text-end">
                        <?php if($transaksi['status']==1) : ?>
                            <span class="badge status-pill bg-warning-subtle text-warning-emphasis border border-warning">DIPROSES</span>
                        <?php elseif($transaksi['status']==2) : ?>
                            <span class="badge status-pill bg-success-subtle text-success-emphasis border border-success">DITERIMA</span>
                        <?php elseif($transaksi['status']==3) : ?>
                            <span class="badge status-pill bg-primary-subtle text-primary-emphasis border border-primary">SELESAI</span>
                        <?php endif; ?>
                    </div>
                </div>

                <table class="table table-borderless align-middle detail-table">
                    <tr>
                        <th width="35%">ID Member</th>
                        <td>: <?= $transaksi['id_member']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama Pelanggan</th>
                        <td>: <?= $transaksi['nama']; ?></td>
                    </tr>
                    <tr>
                        <th>E-mail / HP</th>
                        <td>: <?= $transaksi['email']; ?> / <?= $transaksi['no_hp']; ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>: <?= $transaksi['alamat']; ?></td>
                    </tr>
                    <tr>
                        <th>Kuantitas</th>
                        <td>: <span class="fw-bold"><?= $transaksi['kuantitas']; ?> Unit</span></td>
                    </tr>
                    <tr>
                        <th>Harga Satuan</th>
                        <td>: Rp.<?= number_format($transaksi['harga'], 0, ',', '.'); ?></td>
                    </tr>
                    <tr class="table-active rounded shadow-sm">
                        <th class="text-primary">Total Bayar</th>
                        <td class="h5 fw-bold text-primary">: Rp.<?= number_format($transaksi['total'], 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>: <?= date('d F Y', strtotime($transaksi['tanggal_transaksi'])); ?></td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td>: <span class="fst-italic text-muted"><?= $transaksi['keterangan'] ?: '-'; ?></span></td>
                    </tr>
                </table>

                <div class="mt-auto pt-4 d-flex gap-2">
                    <a href="<?= base_url('transaksi'); ?>" class="btn btn-outline-secondary px-4">
                        <i class="fas fa-arrow-left me-2"></i> Kembali
                    </a>
                    
                    <?php if($this->session->userdata('id_role') == 2 && $transaksi['status'] == 2) : 
                        $wa_msg = "Form Data Pesanan Saya :\n\nID Member : ".$transaksi['id_member']."\nProduk : ".$transaksi['produk']."\nTotal : Rp.".number_format($transaksi['total']);
                        $url_wa = 'https://api.whatsapp.com/send?phone=6285811367152&text=' . urlencode($wa_msg);
                    ?>
                        <a href="<?= $url_wa; ?>" target="_blank" class="btn btn-success px-4 flex-grow-1 shadow-sm">
                            <i class="fab fa-whatsapp me-2"></i> Hubungi via WhatsApp
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>