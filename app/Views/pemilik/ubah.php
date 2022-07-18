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
        <div class="col ">
            <h3 class="text-center">FORM UBAH MENU</h3>
            <hr>
            <form action="/pemilik/update/<?= $produk['id_menu']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="sampulLama" value="<?= $produk['gambar']; ?>">
                <div class="row mb-3 text-left d-flex justify-content-center">
                    <label for="menu" class="col-sm-2 col-form-label">Nama Produk</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control <?=
                                                                ($validation->hasError('nama_menu')) ? 'is-invalid' : ''; ?>" id="nama_menu" name="nama_menu" autofocus value="<?= (old('nama_menu')) ? old('nama_menu') : $produk['nama_menu'] ?>">
                        <div id="judulFeedback" class="invalid-feedback">
                            <?= $validation->getError('nama_menu'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3 text-left d-flex justify-content-center">
                    <label for="detail" class="col-sm-2 col-form-label">Detail Produk</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control <?=
                                                                ($validation->hasError('detail')) ? 'is-invalid' : ''; ?>" id="detail" name="detail" autofocus value="<?= (old('detail')) ? old('detail') : $produk['detail'] ?>">
                        <div id="judulFeedback" class="invalid-feedback">
                            <?= $validation->getError('detail'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3 text-left d-flex justify-content-center">
                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control <?=
                                                                ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" id="harga" name="harga" autofocus value="<?= (old('harga')) ? old('harga') : $produk['harga'] ?>">
                        <div id="judulFeedback" class="invalid-feedback">
                            <?= $validation->getError('harga'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3 d-flex justify-content-center">
                    <label for="sampul" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-6">
                        <div class="custom-file">
                            <input type="file" class="form-control  <?=
                                                                    ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar" onchange="previewImg()">
                            <div id="fileFeedback" class="invalid-feedback">
                                <?= $validation->getError('gambar'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3 d-flex justify-content-center">
                    <div class="col-sm-8 d-flex justify-content-end">
                        <button type="submit" onclick="return confirm('Apakah Anda Yakin??')" class="tombol daftar px-3">
                            <i class="fa fa-paper-plane" aria-hidden="true"></i> Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
<?= $this->endSection(); ?>