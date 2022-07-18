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
            <form action="/nota/simpan" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="text-left ">
                    <div class="row mb-3 d-flex justify-content-center">
                        <label for="tgl" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-6">
                            <input type="datetime" class="form-control" id="tgl" name="tgl" value="<?= date("d-m-Y"); ?>">
                            <!-- <input type="time" class="form-control" id="jam" name="jam"  value="< ?= old('jam'); ?>"> -->

                        </div>
                    </div>

                    <table hidden>
                        <?php
                        $totalprice = 0;
                        foreach ($pesananusr as $a) :
                        ?>
                            <div>

                                <td><?= $a['nama_menu']; ?></td>
                                <td><?= $a['jumlah']; ?></td>
                                <td><?= $a['total']; ?></td>
                                <?php $totalprice += $a['total']; ?>
                                <!-- 
                                <td><a href="/bayar/tambah/<?= $a['id_pesanan']; ?>" class="btn btn-outline-info">Bayar</a>
                                    <form action="/pesanan/<?= $a['id_pesanan']; ?>" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Mau Menghapus Data Ini !!!')">
                                            <i class="fas fa-trash-alt"></i> Batalkan
                                        </button>
                                    </form>
                                </td> -->
                            </div>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="4">Total Price: <?php echo $totalprice ?></td>
                        </tr>
                        <input type="hidden" class="form-control" id="totalbayar" name="totalbayar" value="<?= $totalprice ?>"></input>
                        <input type="hidden" name="id_user" class="form-control disabled muted" value="<?= user_id() ?>"></input>
                        <input type="hidden" name="status" class="form-control disabled muted" value="Belum Dibayar"></input>
                        <input type="hidden" name="id_pelanggan" class="form-control disabled muted" value="<?= $pelangganusr[0]["id_pelanggan"]; ?>"></input>
                    </table>
                    <div class="row mb-3 d-flex justify-content-center">
                        <label class="col-sm-2 col-form-label"> Total Pembayaran</label>
                        <div class="col-sm-6">
                            <span>Rp.<?= $totalprice ?></span>

                        </div>
                    </div>

                    <div class="row mb-3 d-flex justify-content-center">
                        <div class="col-sm-8 d-flex justify-content-end">
                            <button type="submit" onclick="return confirm('Apakah Anda Yakin??')" class="tombol daftar px-3">
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