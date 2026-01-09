<?php

if(isset($_POST['simpan'])){
    $id_admin = $_POST['id_admin'];
    $nama_admin=$_POST['nama_admin'];
    $username=$_POST['username'];
    $password=$_POST['password'];
	
	//proses simpan
    $sql = "INSERT INTO admin VALUES ('$id_admin','$nama_admin', '$username', '$password' )";
    if ($conn->query($sql) === TRUE) {
        header("Location:?page=admin");
    }
}
?>


<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                <div class="card">
                <div class="card-header bg-primary text-white border-dark"><strong>TAMBAH DATA ADMIN</strong></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">ID ADMIN</label>
                        <input type="text" class="form-control" name="id_admin" maxlength="10" required>
                    </div>
                    <div class="form-group">
                        <label for="">NAMA ADMIN</label>
                        <input type="text" class="form-control" name="nama_admin" maxlength="100" required>
                    </div>
                    <div class="form-group">
                        <label for="">USERNAME</label>
                        <input type="text" class="form-control" name="username" maxlength="100" required>
                    </div>
                    <div class="form-group">
                        <label for="">PASSWORD</label>
                        <input type="text" class="form-control" name="password" maxlength="100" required>
                    </div>

                <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
                <a class="btn btn-danger" href="?page=admin">Batal</a>

                </div>
            </div>
        </form>
    </div>
</div>