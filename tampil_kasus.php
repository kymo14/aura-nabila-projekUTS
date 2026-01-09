<div class="card">
  <div class="card-header bg-primary text-white border-dark"><strong>DATA KASUS</strong></div>
  <div class="card-body">
<table class="table table-bordered" id="myTable">
    <thead>
      <tr>
        <th width="100px">ID KASUS</th>
        <th width="800px">NAMA GEJALA</th>
        <th width="400px">NAMA PENYAKIT</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT gejala.*, penyakit.*, kasus.* FROM gejala, penyakit, kasus WHERE kasus.id_penyakit = penyakit.id_penyakit AND kasus.id_gejala = gejala.id_gejala";
      $result = $conn->query($sql);
      while($row = $result->fetch_assoc()) {
        ?>
        <tr>
          <td><?php echo $row['id_kasus']; ?></td>
          <td><?php echo $row['nama_gejala']; ?></td>
          <td><?php echo $row['nama_penyakit']; ?></td>
        </tr>
        <?php
        }
        $conn->close();
        ?>
    </tbody>
</table>
</div>
</div>