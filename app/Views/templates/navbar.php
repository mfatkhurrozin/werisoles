<!-- Navbar -->
<nav class="navbar navbar-expand-lg  bg-dark">
  <div class="container">
    <a class="navbar-brand text-white" href="/"><strong>WE</strong> Risoles</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <?php if (in_groups('user')) : ?>
          <li class="nav-item"><a href="<?= base_url('/'); ?>" class="nav-link mr-4">HOME</a></li>
          <li class="nav-item"><a href="<?= base_url('produk'); ?>" class="nav-link mr-4">DAFTAR MENU</a></li>
          <li class="nav-item"><a href="<?= base_url('keranjang'); ?>" class="nav-link mr-4">KERANJANG</a></li>
          <li class="nav-item"><a href="<?= base_url('nota'); ?>" class="nav-link mr-4">PESANAN</a></li>


        <?php elseif (in_groups('admin')) : ?>
          <li class="nav-item"><a href="<?= base_url('pemilik'); ?>" class="nav-link mr-4">DAFTAR MENU</a></li>
          <li class="nav-item"><a href="<?= base_url('notaadm'); ?>" class="nav-link mr-4">PESANAN</a></li>
          <li class="nav-item"><a href="<?= base_url('laporan'); ?>" class="nav-link mr-4">LAPORAN</a></li>

        <?php elseif (in_groups('superadmin')) : ?>
          <li class="nav-item"><a href="<?= base_url('admin'); ?>" class="nav-link mr-4">Kelola Users</a></li>

        <?php endif; ?>
        <form class="form-inline my-2 my-lg-0" action="" method="POST">
          <input class="form-control mr-sm-2" placeholder="Cari data" name="keyword">
          <button class="btn btn-outline-warning my-2 my-sm-0" type="submit" name="submit">Cari</button>
        </form>
      </ul>
    </div>
  </div>
</nav>
<!-- Akhir Navbar -->