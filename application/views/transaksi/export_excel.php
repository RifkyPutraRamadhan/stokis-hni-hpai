<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
?>

<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Member</th>
            <th>E-mail</th>
            <th>No HP</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Kategori</th>
            <th>Produk</th>
            <th>Kuantitas</th>
            <th>Harga</th>
            <th>Total Transaksi</th>
            <th>Keterangan</th>
            <th>Tanggal Transaksi</th>
            <th>status</th>
         </tr>
    </thead>
    <tbody>
    <?php if( empty($transaksi) ) :?>
                <tr>
                    <td colspan="12">Data Transaksi Tidak Ditemukan</td>
                </tr>
    <?php endif; ?>
    <?php $i=1; ?>
            <?php foreach( $transaksi as $tra ) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $tra['id_member']; ?></td>
                    <td><?= $tra['email']; ?></td>
                    <td><?= $tra['no_hp']; ?></td>
                    <td><?= $tra['nama']; ?></td>
                    <td><?= $tra['alamat']; ?></td>
                    <td><?= $tra['kategori']; ?></td>
                    <td><?= $tra['produk']; ?></td>
                    <td><?= $tra['kuantitas']; ?></td>
                    <td>Rp.<?= $tra['harga']; ?></td>
                    <td>Rp.<?= $tra['total']; ?></td>
                    <td><?= $tra['keterangan']; ?></td>
                    <td><?= $tra['tanggal_transaksi']; ?></td>
                    <td>
                    <?php if($tra['status']==2) : ?>
                        <a>Diterima</a>
                    <?php elseif(($tra['status']==1)) : ?>
                        <a>Diproses</a>
                    <?php elseif(($tra['status']==3)) : ?>
                        <a>Ditolak</a>
                    <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
    </tbody>
</table>