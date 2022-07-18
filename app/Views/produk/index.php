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
    <!-- Menu -->
    <div class="container">
        <div class="row mt-3">

            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan') ?>
                </div>
            <?php endif; ?>

            <?php
            // $i = 1 + (6 * ($currentPage - 1));
            foreach ($produk as $b) :
            ?>

                <div class="col-md-3 mt-4">
                    <div class="card">
                        <img src="upload/<?= $b['gambar'] ?>" class="card-img-top" alt="..." style="max-width: 400px;">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold"><?= $b['nama_menu'] ?></h5>
                            <label class="card-text detail"> <?= $b['detail']; ?></label><br>
                            <label class="card-text harga"><strong>Rp.</strong> <?= number_format($b['harga']); ?></label><br>
                            <a href="/pesanan/tambah/<?= $b['id_menu']; ?>" class="btn btn-success btn-sm btn-block ">BELI</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- Akhir Menu -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
<?= $this->endSection(); ?>