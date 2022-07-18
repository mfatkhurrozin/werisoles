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
    <div style="font-size:20px; color:'#dddddd'">Laporan Pembayaran</div>
    </p>
    <table cellpadding="6">
        <tr>
            <th><strong>Id Pesanan</strong></th>
            <th><strong>Tanggal</strong></th>
            <th><strong>Total Pembayaran</strong></th>

        </tr>
        <?php
        // $i = 1 + (6 * ($currentPage - 1));
        $jumlah = 0;
        foreach ($pesananadm as $b) :
        ?>
            <tr>
                <td><?= $b['id_pesanan'] ?> </td>
                <td><?= $b['tanggal'] ?> </td>
                <td>Rp. <?= $b['total'] ?> </td>
                <?php $jumlah += $b['total']; ?>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td><b>Total</b></td>
            <td></td>
            <td><b>Rp. <?php echo $jumlah ?></b></td>
        </tr>
    </table>

</html>