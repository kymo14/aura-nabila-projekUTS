<?php 
$id_admin=$_GET['id'];

if(isset($_POST['update'])){
    $nama_admin=$_POST['nama_admin'];
    $username=$_POST['username'];
    $password=$_POST['password'];

    // proses update
    $sql = "UPDATE admin SET nama_admin='$nama_admin', username='$username', password='$password' WHERE id_admin='$id_admin'";
    if ($conn->query($sql) === TRUE) {
        header("Location:?page=admin");
    }
}

$sql = "SELECT * FROM admin WHERE id_admin='$id_admin'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                <div class="card">
                <div class="card-header bg-primary text-white border-dark"><strong>UPDATE DATA ADMIN</strong></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">NAMA ADMIN</label>
                        <input type="text" class="form-control" name="nama_admin" value="<?php echo $row['nama_admin']?>" maxlength="100" required>
                    </div>
                    <div class="form-group">
                        <label for="">USERNAME</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $row['username']?>" maxlength="100" required>
                    </div>
                    <div class="form-group">
                        <label for="">PASSWORD</label>
                        <input type="text" class="form-control" name="password" value="<?php echo $row['password']?>" maxlength="100" required>
                    </div>

                <input class="btn btn-primary" type="submit" name="update" value="Update">
                <a class="btn btn-danger" href="?page=admin">Batal</a>

                </div>
            </div>
        </form>
    </div>
</div>