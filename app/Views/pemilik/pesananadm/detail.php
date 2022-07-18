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
    <!-- Menu -->
    <div class="container">
        <div class="row mt-3">

            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan') ?>
                </div>
            <?php endif; ?>
            <div class="card text-center">
                <div class="card-header">
                    Detail
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $pesananadm['nama_menu'] ?></h5>
                    <p class="card-text"><?= $pesananadm['nama'] ?> Alamat : <?= $pesananadm['alamat'] ?> No HP. <?= $pesananadm['hp'] ?></p>
                    <p class="card-text">Jumlah : <?= $pesananadm['jumlah'] ?> </p>
                    <p class="card-text">Status : <?= $pesananadm['status'] ?> </p>
                    <p class="card-text"><b>Total : Rp.<?= $pesananadm['total'] ?></b></p>
                    <a href="/jwb/<?= $bayar['file']; ?>" class="btn btn-primary"><?= $bayar['file']; ?></a>
                </div>
                <div class="card-footer text-muted">
                    <?= $pesananadm['tanggal'] ?>
                </div>
            </div>
        </div>
        <td><a href="/pesanan/ubah/<?= $pesananadm['id_pesanan']; ?>" class="btn btn-outline-info">Ubah Status</a>
    </div>
    <!-- Akhir Menu -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
<?= $this->endSection(); ?>