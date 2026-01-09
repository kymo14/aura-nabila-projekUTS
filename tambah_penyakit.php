<?php

if(isset($_POST['simpan'])){
    $id_penyakit = $_POST['id_penyakit'];
    $nama_penyakit=$_POST['nama_penyakit'];
    $keterangan=$_POST['keterangan'];
	
	//proses simpan
    $sql = "INSERT INTO penyakit VALUES ('$id_penyakit','$nama_penyakit', '$keterangan' )";
    if ($conn->query($sql) === TRUE) {
        header("Location:?page=penyakit");
    }
}
?>


<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                <div class="card">
                <div class="card-header bg-primary text-white border-dark"><strong>TAMBAH DATA PENYAKIT</strong></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">ID PENYAKIT</label>
                        <input type="text" class="form-control" name="kode_penyakit" maxlength="10" required>
                    </div>
                    <div class="form-group">
                        <label for="">NAMA PENYAKIT</label>
                        <input type="text" class="form-control" name="nama_penyakit" maxlength="255" required>
                    </div>
                    <div class="form-group">
                        <label for="">KETERANGAN</label>
                        <input type="text" class="form-control" name="keterangan" maxlength="255" required>
                    </div>

                <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
                <a class="btn btn-danger" href="?page=penyakit">Batal</a>

                </div>
            </div>
        </form>
    </div>
</div>