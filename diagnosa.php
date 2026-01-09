<?php
include "config.php";

$sql = "SELECT id_gejala, nama_gejala FROM gejala ORDER BY id_gejala";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}
?>

<div class="row">
    <div class="col-sm-12">
        <form action="index.php?page=diagnosa&action=tampil" method="POST">
            <div class="card border-dark">
                <div class="card-header bg-primary text-white">
                    <strong>DATA DIAGNOSA</strong>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>NAMA</label>
                        <input type="text" name="nama_pengguna" class="form-control" required>
                    </div>
                    <br>
                    <table class="table table-bordered">
                        <tr>
                            <th width="50">PILIH</th>
                            <th>GEJALA</th>
                        </tr>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td>
                                <input type="checkbox"
                                       name="gejala[]"
                                       value="<?= $row['id_gejala']; ?>">
                            </td>
                            <td><?= $row['nama_gejala']; ?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="btn btn-primary">
                                    Proses Diagnosa
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>