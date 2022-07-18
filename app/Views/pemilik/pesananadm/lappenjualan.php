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
    <div style="font-size:20px; color:'#dddddd'">Laporan penjualan</div>
    </p>
    <table cellpadding="6">
        <tr>
            <th><strong>Menu</strong></th>
            <th><strong>Jumlah</strong></th>
            <th><strong>Total</strong></th>

        </tr>
        <?php
        // $i = 1 + (6 * ($currentPage - 1));
        $totalprice = 0;
        foreach ($pesanan as $a) :
        ?>
            <tr>
                <td><?= $a['nama_menu']; ?></td>
                <td><?= $a['jumlah']; ?></td>
                <td>Rp.<?= $a['total']; ?></td>
                <?php $totalprice += $a['total']; ?>
            </tr>
        <?php endforeach; ?>
        <tr>
            <th scope="col">TOTAL BAYAR </th>
            <th></th>
            <th> Rp.<?php echo $totalprice ?></th>
        </tr>
    </table>

</html>