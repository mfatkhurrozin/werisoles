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

    <!-- <input type="hiden" class="form-control disabled muted" id="txt3" /> -->

    <div class="container">
        <div class="col ">
            <h3 class="text-center">Form Pembayaran</h3>
            <hr>
            <form action="/bayar/simpan" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3 d-flex justify-content-center">
                    <label class="col-sm-2 col-form-label"> Total Pembayaran</label>
                    <div class="col-sm-6">
                        <span><b>Rp. <?= $id_nota['totalbayar']; ?></b></span>
                        <hr>
                        <p><i>Silahkan Transfer Sesuai Total Pembayaran Diatas Termasuk Kode Uniknya</i></p>
                        <p><i>BRI : 595501009616539 a/n Muhammad Fatkhurrozin</i></p>
                        <p><i>BCA : 0980239152 a/n Muhammad Fatkhurrozin</i></p>

                    </div>
                </div>


                <div class="row mb-3 d-flex justify-content-center">
                    <label for="sampul" class="col-sm-2 col-form-label">Bukti Pembayaran</label>
                    <div class="col-sm-6">
                        <input type="hidden" name="id_nota" class="form-control disabled muted" value="<?= $id_nota['id_nota']; ?>"></input>
                        <div class="custom-file">
                            <input type="file" class="form-control  <?=
                                                                    ($validation->hasError('file')) ? 'is-invalid' : ''; ?>" id="file" name="file" onchange="previewImg()">
                            <div id="fileFeedback" class="invalid-feedback">
                                <?= $validation->getError('file'); ?>
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