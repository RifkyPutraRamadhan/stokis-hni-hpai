<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
?>

<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Produk</th>
            <th>Kategori</th>
            <th>Dimensi Kualitas</th>
            <th>Berat Bersih</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Keterangan</th>
            <th>Tanggal Proses</th>
         </tr>
    </thead>
    <tbody>
    <?php if( empty($barang) ) :?>
                <tr>
                    <td colspan="10">Data Barang Tidak Ditemukan</td>
                </tr>
    <?php endif; ?>
    <?php $i=1; ?>
            <?php foreach( $barang as $bar ) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $bar['kode']; ?></td>
                    <td><?= $bar['produk']; ?></td>
                    <td><?= $bar['kategori']; ?></td>
                    <td><?= $bar['dimensi_kualitas']; ?></td>
                    <td><?= $bar['berat_bersih']; ?></td>
                    <td><?= $bar['stok']; ?></td>
                    <td>Rp.<?= $bar['harga']; ?></td>
                    <td><?= $bar['keterangan']; ?></td>
                    <td><?= $bar['tanggal_proses']; ?></td>
                </tr>
            <?php endforeach; ?>
    </tbody>
</table>