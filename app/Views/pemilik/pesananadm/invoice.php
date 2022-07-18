<html lang="en">

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #000000;
            text-align: center;
            height: 20px;
            margin: 8px;
        }
    </style>
</head>

<body>

    <div style="font-size:64px; color:'#dddddd'"><i>We Risoles</i></div>
    <p>
        <i>We Risoles</i><br>
        Pekalongan, Indonesia
    </p>
    <hr>
    <hr>
    <p></p>
    <p>
        Pembeli : <?= $pesananadm['nama'] ?> <br>
        Alamat : <?= $pesananadm['alamat'] ?> <br>
        Transaksi No : <?= $pesananadm['id_pesanan'] ?> <br>
        Tanggal : <?= $pesananadm['tanggal'] ?><br>
    </p>
    <table cellpadding="6">
        <tr>
            <th><strong>Produk</strong></th>
            <th><strong>Jumlah</strong></th>
            <th><strong>Total Harga</strong></th>
            <th><strong>Alamat</strong></th>
        </tr>
        <tr>
            <td><?= $pesananadm['nama_menu'] ?> </td>
            <td><?= $pesananadm['jumlah'] ?> </td>
            <td>Rp. <?= $pesananadm['total'] ?> </td>
            <td><?= $pesananadm['alamat'] ?> </td>
        </tr>
    </table>

</html>