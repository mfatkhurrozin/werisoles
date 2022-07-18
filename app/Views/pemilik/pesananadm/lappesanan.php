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
    <div style="font-size:20px; color:'#dddddd'">Laporan Pesanan</div>
    </p>
    <table cellpadding="6">
        <tr>
            <th><strong>Tanggal</strong></th>
            <th><strong>Menu</strong></th>
            <th><strong>Jumlah</strong></th>

        </tr>
        <?php
        // $i = 1 + (6 * ($currentPage - 1));
        foreach ($pesananadm as $b) :
        ?>
            <tr>
                <td><?= $b['tanggal'] ?> </td>
                <td><?= $b['nama_menu'] ?> </td>
                <td><?= $b['jumlah'] ?> </td>
            </tr>
        <?php endforeach; ?>
    </table>

</html>