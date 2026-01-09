<?php

$id_admin=$_GET['id'];

$sql = "DELETE FROM admin WHERE id_admin='$id_admin'";
if ($conn->query($sql) === TRUE) {
    header("Location:?page=admin");
}
$conn->close();
?>