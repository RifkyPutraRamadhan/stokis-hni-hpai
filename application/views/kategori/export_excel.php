<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
?>

<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
         </tr>
    </thead>
    <tbody>
    <?php if( empty($kategori) ) :?>
                <tr>
                    <td colspan="12">Data Kategori Tidak Ditemukan</td>
                </tr>
    <?php endif; ?>
    <?php $i=1; ?>
            <?php foreach( $kategori as $kat ) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $kat['kategori']; ?></td>
                </tr>
            <?php endforeach; ?>
    </tbody>
</table>