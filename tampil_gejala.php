<div class="card">
  <div class="card-header bg-primary text-white border-dark"><strong>DATA GEJALA</strong></div>
  <div class="card-body">
<a class="btn btn-primary mb-2" href="?page=gejala&action=tambah">Tambah</a>
<table class="table table-bordered" id="myTable">
    <thead>
      <tr>
        <th width="100px">ID GEJALA</th>
        <th width="500px">NAMA GEJALA</th>
        <th width="80px">BOBOT</th>
        <th width="100px">OPSI</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT*FROM gejala";
      $result = $conn->query($sql);
      while($row = $result->fetch_assoc()) {
        ?>
        <tr>
          <td><?php echo $row['id_gejala']; ?></td>
          <td><?php echo $row['nama_gejala']; ?></td>
          <td><?php echo $row['bobot']; ?></td>
          <td>
            <a class="btn btn-warning" href="?page=gejala&action=update&id=<?php echo $row['id_gejala']; ?>">
              <i class="fas fa-edit"></i>
            </a>
            <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=gejala&action=hapus&id=<?php echo $row['id_gejala']; ?>">
              <i class="fas fa-trash-alt"></i>
            </a>
          </td>
        </tr>
        <?php
        }
        $conn->close();
        ?>
    </tbody>
</table>
</div>
</div>