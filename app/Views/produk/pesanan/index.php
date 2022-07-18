<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lato" rel="stylesheet">
    <title><?php $title; ?></title>
</head>

<body>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col">
                <h3 class="text-center">Daftar Pesanan</h3>
                <hr>
                <!-- flashdata dengan alert --->
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan') ?>
                    </div>
                <?php endif; ?>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $totalprice = 0;
                        foreach ($pesananusr as $a) :
                        ?>
                            <tr>

                                <td><?= $a['nama_menu']; ?></td>
                                <td><?= $a['jumlah']; ?></td>
                                <td>Rp.<?= $a['total']; ?></td>
                                <?php $totalprice += $a['total']; ?>
                                <!-- 
                                <td><a href="/bayar/tambah/<?= $a['id_pesanan']; ?>" class="btn btn-outline-info">Bayar</a>
                                    <form action="/pesanan/<?= $a['id_pesanan']; ?>" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Mau Menghapus Data Ini !!!')">
                                            <i class="fas fa-trash-alt"></i> Batalkan
                                        </button>
                                    </form>
                                </td> -->
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <th scope="col">TOTAL BAYAR </th>
                            <th></th>
                            <th> Rp.<?php echo $totalprice ?></th>
                        </tr>
                    </tbody>
                </table>
                <a href="/pelanggan/tambah/" class="btn btn-outline-info">Pesan</a>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
<?= $this->endSection(); ?>