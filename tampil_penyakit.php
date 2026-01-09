<div class="card">
  <div class="card-header bg-primary text-white border-dark"><strong>DATA PENYAKIT</strong></div>
  <div class="card-body">
<a class="btn btn-primary mb-2" href="?page=penyakit&action=tambah">Tambah</a>
<table class="table table-bordered" id="myTable">
    <thead>
      <tr>
        <th width="100px">ID PENYAKIT</th>
        <th width="200px">NAMA PENYAKIT</th>
        <th width="300px">KETERANGAN</th>
        <th width="100px">OPSI</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT*FROM penyakit";
      $result = $conn->query($sql);
      while($row = $result->fetch_assoc()) {
        ?>
        <tr>
          <td><?php echo $row['id_penyakit']; ?></td>
          <td><?php echo $row['nama_penyakit']; ?></td>
          <td><?php echo $row['keterangan']; ?></td>
          <td>
            <a class="btn btn-warning" href="?page=penyakit&action=update&id=<?php echo $row['id_penyakit']; ?>">
              <i class="fas fa-edit"></i>
            </a>
            <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=penyakit&action=hapus&id=<?php echo $row['id_penyakit']; ?>">
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