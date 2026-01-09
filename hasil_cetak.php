<?php
require "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Laporan Hasil Diagnosa CBR</title>

    <!-- Bootstrap & Material -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-dashboard.css" rel="stylesheet" />

    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body class="sb-nav-fixed">

<center>
    <h2>LAPORAN DATA HASIL DIAGNOSA</h2>
    <h4>METODE CASE BASED REASONING (CBR)</h4>
</center>

<hr size="10px" width="50%">
<br>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="material-datatables">

                <table class="table table-striped table-bordered table-hover" width="100%">
                    <thead>
                        <tr>
                            <th>ID HASIL</th>
                            <th>NAMA</th>
                            <th>PENYAKIT</th>
                            <th>NILAI (%)</th>
                            <th>TANGGAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "
                            SELECT 
                                h.id_hasil,
                                h.nama_pengguna,
                                p.nama_penyakit,
                                h.nilai,
                                h.tanggal
                            FROM hasil_diagnosa h
                            JOIN penyakit p ON h.id_penyakit = p.id_penyakit
                            ORDER BY h.id_hasil ASC
                        ";

                        $query = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($query) > 0) {
                            while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                        <tr>
                            <td><strong><?= $row['id_hasil']; ?></strong></td>
                            <td><strong><?= $row['nama_pengguna']; ?></strong></td>
                            <td><strong><?= $row['nama_penyakit']; ?></strong></td>
                            <td><strong><?= $row['nilai']; ?>%</strong></td>
                            <td><strong><?= $row['tanggal']; ?></strong></td>
                        </tr>
                        <?php
                            }
                        } else {
                        ?>
                        <tr>
                            <td colspan="5" align="center">Data tidak tersedia</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </main>
</div>

<!-- JS (tetap disertakan seperti contoh) -->
<script src="assets/js/jquery-3.1.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/material.min.js"></script>

<script>
    window.print();
</script>

</body>
</html>