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
  </div>
  <div class="container">
    <div class="judul text-center mt-5">
      <h3 class="font-weight-bold">WE RISOLES</h3>
      <h5>STMIK Widya Pratama, Pekalongan
        <br>Buka Jam <strong>07:00 - 21:00</strong>
      </h5>
    </div>

    <div class="row mb-5 mt-5 ">
      <div class="col-md-6 d-flex justify-content-end">
        <div class="card bg-dark text-white border-light">
          <img src="images/bg5.jpg" class="card-img" alt="Lihat Daftar Menu">
          <div class="card-img-overlay mt-5 text-center">
            <a href="/produk" class="btn btn-primary">LIHAT DAFTAR MENU</a>
          </div>
        </div>
      </div>

      <div class="col-md-6 d-flex justify-content-start">
        <div class="card bg-dark text-white border-light">
          <img src="images/bg3.jpg" class="card-img" alt="Lihat Pesanan">
          <div class="card-img-overlay mt-5 text-center">
            <a href="/pesanan" class="btn btn-primary">LIHAT PESANAN</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
<?= $this->endSection(); ?>