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
                <h3 class="text-center">Detail Pesanan</h3>
                <hr>
                <!-- flashdata dengan alert --->
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan') ?>
                    </div>
                <?php endif; ?>
                <table class="table mt-3">
                    <h5>Detail Pelanggan</h5>
                    <tbody>
                        <?php
                        foreach ($pelanggan as $a) :
                        ?>
                            <tr>
                                <td>Nama Pemesam : <?= $a['nama']; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat : <?= $a['alamat']; ?></td>
                            </tr>
                            <tr>
                                <td>No HP :<?= $a['hp']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <br>
                <table class="table mt-3">
                    <h5 class="text-center">Daftar Pesanan</h5>
                    <thead>
                        <tr>
                            <!-- <th scope="col">Tangggal</th> -->
                            <!-- <th scope="col">Pembeli</th> -->
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($pesananadm as $a) :
                        ?>
                            <tr>


                                <td><?= $a['nama_menu']; ?></td>
                                <td><?= $a['jumlah']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <td><a href="/bayaradm" class="btn btn-outline-info">Bukti Pembayaran</a>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
<?= $this->endSection(); ?>