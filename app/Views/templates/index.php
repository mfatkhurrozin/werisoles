<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="index.css">
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

  <title>WE Risoeles</title>
  <style>
    .tombol {
      box-shadow: none;
      background: #00abd4;
      border: none;
      padding: .5rem 1rem;
      border-radius: 8px;
      text-decoration: none;
      color: white;
    }

    .login {
      background: white;
      border: 1px solid #00abd4;
    }

    .login:hover {
      background: #00abd4;
      color: white;
    }

    .daftar {
      color: white;
    }

    .tombol:hover {
      -webkit-box-shadow: 0 10px 6px -6px #00abd4;
      -moz-box-shadow: 0 10px 6px -6px #00abd4;
      box-shadow: 0 10px 6px -6px #00abd4;
      transition: all 0.15s ease-out;
      color: white;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      font-family: sans-serif;
      font-size: 16px;
    }

    /*Jumbotron*/
    .jumbotron {
      background-image: url(/images/bg4.jpg);
      background-size: cover;
      height: 350px;
      width: 100%;
      color: white;
    }

    .jumbotron .display-4 {
      margin-top: 30px;
    }

    .jumbotron p {
      font-size: 23px;
    }

    .jumbotron hr {
      border-color: white;
      width: 400px;
      border-width: 3px;
    }

    /*Akhir Jumbotron*/

    /*Navbar*/
    .navbar {
      margin-top: -32px;
    }

    .navbar .navbar-nav .nav-link {
      color: white;
    }

    .navbar .navbar-nav .nav-link:hover {
      color: orange;
    }

    .navbar .navbar-brand {
      font-size: 30px;
    }

    /*Akhir Navbar*/

    /*Footer*/
    .footer {
      margin-top: 150px;
      border-width: 3px;
    }

    .footer-body {
      margin-top: 60px;
      margin-bottom: 50px;
    }

    /*Akhir Footer*/

    /*Home*/
    .judul {
      margin-bottom: 120px;
    }

    .card-img:hover {
      box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.4);
    }

    /*Akhir Home*/
  </style>
</head>

<body>

  <div>
    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid text-center">
      <div class="container">
        <h1 class="display-4"><span class="font-weight-bold">WE RISOLES</span></h1>
        <hr>
        <p class="lead font-weight-bold">Silahkan Pesan Rioles Sesuai Keinginan Anda <br>
          Enjoy Your Meal</p>
      </div>
    </div>
    <!-- Akhir Jumbotron -->

    <?= $this->include('templates/navbar'); ?>

    <div class="row-md-3 float-right align-items-baseline">
      <!-- <button type="button" class="tombol login me-2">Login</button> -->

      <a href="<?= base_url('logout'); ?>" class="tombol daftar">
        <i class="fas fa-sign-out-alt"></i>
        Out
      </a>
    </div>


  </div>

  <main role="main" class="container">

    <div class="starter-template">
      <?= $this->renderSection('content'); ?>
    </div>

  </main><!-- /.container -->

  <!-- Awal Footer -->
  <hr class="footer">
  <div class="container">
    <div class="row footer-body">
      <div class="col-md-6">
        <div class="copyright">
          <strong>Copyright</strong> <i class="far fa-copyright"></i> 2022 - WE Risoles</p>
        </div>
      </div>

      <div class="col-md-6 d-flex justify-content-end">
        <div class="icon-contact">
          <label class="font-weight-bold">Follow Us </label>
          <a href="#"><img src="/images/fb.png" class="mr-3 ml-4" data-toggle="tooltip" title="Facebook"></a>
          <a href="#"><img src="/images/ig.png" class="mr-3" data-toggle="tooltip" title="Instagram"></a>
          <a href="#"><img src="/images/twitter.png" class="" data-toggle="tooltip" title="Twitter"></a>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir Footer -->
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  <script>
    function previewImg() {
      const sampul = document.querySelector('.custom-file-input');
      const sampulLabel = document.querySelector('.custom-file-label');
      const imgPreview = document.querySelector('.img-preview');

      //Mengganti nama Gambar
      sampulLabel.textContent = sampul.files[0].name;

      //mengganti preview gambar

      const fileSampul = new FileReader();
      fileSampul.readAsDataURL(sampul.files[0]);

      fileSampul.onload = function(e) {
        imgPreview.src = e.target.result;
      }

    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>