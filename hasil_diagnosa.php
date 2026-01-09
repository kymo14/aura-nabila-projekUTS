<?php
include "config.php";
?>

<div class="card">
  <div class="card-header bg-primary text-white border-dark">
    <strong>HASIL DIAGNOSA</strong>
  </div>
  <div class="card-body">
  <a class="btn btn-primary mb-2" href="hasil_cetak.php">Cetak</a>
    <table class="table table-bordered" id="myTable">
      <thead>
        <tr>
          <th width="80">ID HASIL</th>
          <th>NAMA</th>
          <th>PENYAKIT</th>
          <th width="120">NILAI (%)</th>
          <th width="180">TANGGAL</th>
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
          ORDER BY h.tanggal DESC
        ";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?= $row['id_hasil']; ?></td>
            <td><?= $row['nama_pengguna']; ?></td>
            <td><?= $row['nama_penyakit']; ?></td>
            <td><?= $row['nilai']; ?> %</td>
            <td><?= $row['tanggal']; ?></td>
          </tr>
        <?php 
          }
        } 
        ?>
      </tbody>
    </table>
  </div>
</div>