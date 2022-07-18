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
            <h3 class="text-center">Form Pesanan</h3>
            <hr>
            <form action="/pesanan/simpan" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="text-left ">
                    <div class="row mb-3 d-flex justify-content-center">
                        <label class="col-sm-2 col-form-label"> Produk</label>
                        <div class="col-sm-6">
                            <input type="hidden" name="id_user" class="form-control disabled muted" value="<?= user_id() ?>"></input>
                            <input type="hidden" name="id_produk" class="form-control disabled muted" value="<?= $id_produk['id_menu']; ?>"></input>
                            <input type="hidden" name="status" class="form-control disabled muted" value="Belum Dibayar"></input>
                            <input type="hidden" name="nama_produk" class="form-control disabled muted" value="<?= $id_produk['nama_menu']; ?>"></input>
                            <span><?= $id_produk['nama_menu']; ?></span>
                        </div>

                    </div>

                    <div class="row mb-3 d-flex justify-content-center">
                        <label class="col-sm-2 col-form-label"> Harga</label>
                        <div class="col-sm-6">
                            <input type="hidden" id="txt1" autofocus value="<?= (old('harga')) ? old('harga') : $id_produk['harga'] ?>" onkeyup="sum();" />
                            <span>Rp. <?= $id_produk['harga']; ?></span>
                        </div>

                    </div>

                    <div class="row mb-3 text-left d-flex justify-content-center">
                        <label for="judul" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control <?=
                                                                    ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" id="jumlah" name="jumlah" onkeyup="sum();" autofocus value="<?= old('jumlah'); ?>">
                            <div id="judulFeedback" class="invalid-feedback">
                                <?= $validation->getError('jumlah'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 d-flex justify-content-center">
                        <label class="col-sm-2 col-form-label"> Total Pembayaran</label>
                        <div class="col-sm-6">
                            <input type="hidden" id="random" name="random" value="<?php echo rand(2, 200); ?>" onkeyup="sum();" />
                            <input type="text" class="form-control " id="total" name="total" autofocus value="<?= old('total'); ?>" />

                        </div>
                    </div>

                    <div class="row mb-3 d-flex justify-content-center">
                        <div class="col-sm-8 d-flex justify-content-end">
                            <button type="submit" class="tombol daftar px-3">
                                <i class="fa fa-paper-plane" aria-hidden="true"></i> Masukan Kranjang</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
        function sum() {
            var txtFirstNumberValue = document.getElementById('txt1').value;
            var txtSecondNumberValue = document.getElementById('jumlah').value;
            // var txtThirdNumberValue = document.getElementById('random').value;
            var result = (parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue));
            if (!isNaN(result)) {
                document.getElementById('total').value = result;
            }
        }
    </script>
</body>

</html>
<?= $this->endSection(); ?>