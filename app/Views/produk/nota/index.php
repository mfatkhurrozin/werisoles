<?= $this->extend('/template'); ?>
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
                            <!-- <th scope="col">Tanggal</th> -->
                            <th scope="col">Tanggal </th>
                            <th scope="col">Total Bayar</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                            <!-- <th scope="col">Status</th>
                            <th scope="col">Aksi</th> -->
                            <!-- <th scope="col">Bukti Pembayaran</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($nota as $a) :
                        ?>
                            <tr>
                                <td><?= $a['tgl']; ?></td>
                                <td>Rp.<?= $a['totalbayar']; ?></td>
                                <td><?= $a['status']; ?></td>

                                <td><a href="/bayar/tambah/<?= $a['id_nota']; ?>" class="btn btn-outline-info">Bayar</a>
                                    <form action="/nota/<?= $a['id_nota']; ?>" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Mau Menghapus Data Ini !!!')">
                                            <i class="fas fa-trash-alt"></i> Batalkan
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
<?= $this->endSection(); ?>