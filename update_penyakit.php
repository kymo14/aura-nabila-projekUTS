<?php 
$id_penyakit=$_GET['id'];

//proses update
if(isset($_POST['update'])){
    $nama_penyakit=$_POST['nama_penyakit'];
    $keterangan=$_POST['keterangan'];

    $sql = "UPDATE penyakit SET nama_penyakit='$nama_penyakit', keterangan='$keterangan' WHERE id_penyakit='$id_penyakit'";
    if ($conn->query($sql) === TRUE) {
        header("Location:?page=penyakit");
    }
}

$sql = "SELECT * FROM penyakit WHERE id_penyakit='$id_penyakit'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                <div class="card">
                <div class="card-header bg-primary text-white border-dark"><strong>UPDATE DATA PENYAKIT</strong></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">NAMA PENYAKIT</label>
                        <input type="text" class="form-control" name="nama_penyakit" value="<?php echo $row['nama_penyakit']?>" maxlength="255" required>
                    </div>
                    <div class="form-group">
                        <label for="">KETERANGAN</label>
                        <input type="text" class="form-control" name="keterangan" value="<?php echo $row['keterangan']?>" maxlength="255" required>
                    </div>

                <input class="btn btn-primary" type="submit" name="update" value="Update">
                <a class="btn btn-danger" href="?page=penyakit">Batal</a>

                </div>
            </div>
        </form>
    </div>
</div>