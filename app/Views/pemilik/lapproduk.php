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
    <div style="font-size:20px; color:'#dddddd'">Daftar Produk</div>
    </p>
    <table cellpadding="6">
        <tr>
            <th><strong>Nama</strong></th>
            <th><strong>Detail</strong></th>
            <th><strong>Harga</strong></th>
        </tr>
        <?php
        // $i = 1 + (6 * ($currentPage - 1));
        foreach ($produk as $b) :
        ?>
            <tr>
                <td><?= $b['nama_menu'] ?> </td>
                <td><?= $b['detail'] ?> </td>
                <td> Rp. <?= $b['harga'] ?> </td>
            </tr>
        <?php endforeach; ?>
    </table>

</html>