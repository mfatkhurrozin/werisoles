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

    <!-- <input type="hiden" class="form-control disabled muted" id="txt3" /> -->

    <div class="container">
        <div class="row text-center mb-3">
            <div class="col">
                <h2>Contact Me</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show d-none my-alert" role="alert">
                    <strong>Terimakasih!</strong> Pesan anda sudah kami terima.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <form name="contact-form">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" aria-describedby="name" name="nama" />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="email" name="email" />
                    </div>
                    <div class="mb-3">
                        <label for="pesan" class="form-label">Pesan</label>
                        <textarea class="form-control" id="pesan" rows="3" name="pesan"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-kirim">Kirim</button>

                    <button class="btn btn-primary btn-loading d-none" type="button" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...
                    </button>
                </form>
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