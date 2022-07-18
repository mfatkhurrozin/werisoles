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
            <h3 class="text-center">Masukan Detail Pelanggan</h3>
            <hr>
            <form action="/pelanggan/simpan" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3 text-left d-flex justify-content-center">
                    <label for="menu" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control <?=
                                                                ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= old('nama'); ?>">
                        <div id="judulFeedback" class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3 text-left d-flex justify-content-center">
                    <label for="detail" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control <?=
                                                                ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" autofocus value="<?= old('alamat'); ?>">
                        <div id="judulFeedback" class="invalid-feedback">
                            <?= $validation->getError('alamat'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3 text-left d-flex justify-content-center">
                    <label for="harga" class="col-sm-2 col-form-label">No HP</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control <?=
                                                                ($validation->hasError('hp')) ? 'is-invalid' : ''; ?>" id="hp" name="hp" autofocus value="<?= old('hp'); ?>">
                        <div id="judulFeedback" class="invalid-feedback">
                            <?= $validation->getError('hp'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3 d-flex justify-content-center">
                    <div class="col-sm-8 d-flex justify-content-end">
                        <button type="submit" class="tombol daftar px-3">
                            <i class="fa fa-paper-plane" aria-hidden="true"></i> Pesan</button>
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