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
            <form action="/pesanan/update/<?= $pesanan['id_pesanan']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="text-left ">

                    <div class="row mb-3 text-left d-flex justify-content-center">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control  <?=
                                                                    ($validation->hasError('status')) ? 'is-invalid' : ''; ?>" id="status" name="status" autofocus value="<?= (old('status')) ? old('status') : $pesanan['status'] ?>">
                            <div id="judulFeedback" class="invalid-feedback">
                                <?= $validation->getError('status'); ?>
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
    <script>
        function sum() {
            var txtFirstNumberValue = document.getElementById('txt1').value;
            var txtSecondNumberValue = document.getElementById('jumlah').value;
            var txtThirdNumberValue = document.getElementById('random').value;
            var result = (parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue) + parseInt(txtThirdNumberValue));
            if (!isNaN(result)) {
                document.getElementById('total').value = result;
            }
        }
    </script>
</body>

</html>
<?= $this->endSection(); ?>