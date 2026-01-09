<?php

if(isset($_POST['simpan'])){
    $id_gejala = $_POST['id_gejala'];
    $nama_gejala=$_POST['nama_gejala'];
    $bobot=$_POST['bobot'];
	
	//proses simpan
    $sql = "INSERT INTO gejala VALUES ('$id_gejala','$nama_gejala','$bobot')";
    if ($conn->query($sql) === TRUE) {
        header("Location:?page=gejala");
    }
}
?>


<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                <div class="card">
                <div class="card-header bg-primary text-white border-dark"><strong>TAMBAH DATA GEJALA</strong></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">ID GEJALA</label>
                        <input type="text" class="form-control" name="id_gejala" maxlength="10" required>
                    </div>
                    <div class="form-group">
                        <label for="">NAMA GEJALA</label>
                        <input type="text" class="form-control" name="nama_gejala" maxlength="255" required>
                    </div>
                    <div class="form-group">
                        <label for="">BOBOT</label>
                        <input type="text" class="form-control" name="bobot" maxlength="11" required>
                    </div>

                <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
                <a class="btn btn-danger" href="?page=gejala">Batal</a>

                </div>
            </div>
        </form>
    </div>
</div>