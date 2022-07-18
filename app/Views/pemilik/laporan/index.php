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
        <div class="row text-center mb-3">
            <div class="col">
                <h2>LAPORAN</h2>
                <a href="/laporanpdf/lappenjualan" class="btn btn-outline-warning mt-3"><i class="fas fa-file-alt"></i> Laporan Penjualan</a>
                <!-- <a href="/laporanpdf/lappembayaran" class="btn btn-outline-warning mt-3"><i class="fas fa-file-alt"></i> Laporan Pembayaran</a> -->
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
        const scriptURL = 'https://script.google.com/macros/s/AKfycbyo87C0QjtoFjaPmYqEWVj9vjtIJFwd3NVWQ8GAvgCfgwH7AtU1QsKEtfRbNsuVYgiA/exec';
        const form = document.forms['contact-form'];
        const btnKirim = document.querySelector('.btn-kirim');
        const btnLoading = document.querySelector('.btn-loading');
        const myAlert = document.querySelector('.my-alert');

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            // ketika tombol submit diklik
            // tampilkan tombol loading, hilangkan tombol kirim
            btnLoading.classList.toggle('d-none');
            btnKirim.classList.toggle('d-none');
            fetch(scriptURL, {
                    method: 'POST',
                    body: new FormData(form)
                })
                .then((response) => {
                    // tampilkan tombol kirim, hilangkan tombol loading
                    btnLoading.classList.toggle('d-none');
                    btnKirim.classList.toggle('d-none');
                    // tampilkan alert
                    myAlert.classList.toggle('d-none');
                    // reset formnya
                    form.reset();
                    console.log('Success!', response);
                })
                .catch((error) => console.error('Error!', error.message));
        });
    </script>
</body>

</html>
<?= $this->endSection(); ?>