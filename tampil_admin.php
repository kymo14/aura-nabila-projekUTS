<div class="card">
  <div class="card-header bg-primary text-white border-dark"><strong>DATA ADMIN</strong></div>
  <div class="card-body">
<a class="btn btn-primary mb-2" href="?page=admin&action=tambah">Tambah</a>
<table class="table table-bordered" id="myTable">
    <thead>
      <tr>
        <th width="100px">ID ADMIN</th>
        <th width="200px">NAMA ADMIN</th>
        <th width="300px">USERNAME</th>
        <th width="300px">PASSWORD</th>
        <th width="100px">OPSI</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT*FROM admin";
      $result = $conn->query($sql);
      while($row = $result->fetch_assoc()) {
        ?>
        <tr>
          <td><?php echo $row['id_admin']; ?></td>
          <td><?php echo $row['nama_admin']; ?></td>
          <td><?php echo $row['username']; ?></td>
          <td><?php echo $row['password']; ?></td>
          <td>
            <a class="btn btn-warning" href="?page=admin&action=update&id=<?php echo $row['id_admin']; ?>">
              <i class="fas fa-edit"></i>
            </a>
            <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=admin&action=hapus&id=<?php echo $row['id_admin']; ?>">
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