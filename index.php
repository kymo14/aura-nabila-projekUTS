<?php
session_start();
include "config.php";

if($_SESSION['status'] != "y"){
    header("Location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Diagnosa Flutd</title>

	<!-- ADMINHUB -->
	<link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
	<link rel="stylesheet" href="style.css">

	<!-- BOOTSTRAP & DATATABLES (TETAP) -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/datatables.min.css">
	<link rel="stylesheet" href="assets/css/all.css">
</head>

<body>

<!-- SIDEBAR -->
<section id="sidebar">
    <a class="brand" style="justify-content: center;">
        <span class="text">METODE CBR</span>
    </a>

	<ul class="side-menu top">
		<li class="<?= ($_GET['page'] ?? '')=='' ? 'active':'' ?>">
			<a href="?page=">
				<i class='fas fa-th-large'></i>
				<span class="text">Dashboard</span>
			</a>
		</li>
		<li class="<?= ($_GET['page'] ?? '') === 'admin' ? 'active' : '' ?>">
			<a href="?page=admin">
				<i class='fas fa-user-alt'></i>
				<span class="text">Admin</span>
			</a>
		</li>
		<li class="<?= ($_GET['page'] ?? '') === 'gejala' ? 'active' : '' ?>">
			<a href="?page=gejala">
				<i class='fas fa-th-list'></i>
				<span class="text">Gejala</span>
			</a>
		</li>
		<li class="<?= ($_GET['page'] ?? '') === 'penyakit' ? 'active' : '' ?>">
			<a href="?page=penyakit">
				<i class='fas fa-th-list'></i>
				<span class="text">Penyakit</span>
			</a>
		</li>
		<li class="<?= ($_GET['page'] ?? '') === 'kasus' ? 'active' : '' ?>">
			<a href="?page=kasus">
				<i class='fas fa-th-list'></i>
				<span class="text">Kasus</span>
			</a>
		</li>
		<li class="<?= ($_GET['page'] ?? '') === 'diagnosa' ? 'active' : '' ?>">
			<a href="?page=diagnosa">
				<i class='fas fa-pen'></i>
				<span class="text">Diagnosa</span>
			</a>
		</li>
		<li class="<?= ($_GET['page'] ?? '') === 'hasil_diagnosa' ? 'active' : '' ?>">
			<a href="?page=hasil_diagnosa">
				<i class='fas fa-th'></i>
				<span class="text">Hasil Diagnosa</span>
			</a>
		</li>

	</ul>

	<ul class="side-menu">
		<li>
			<a href="?page=logout" class="logout">
				<i class='fas fa-arrow-alt-circle-left'></i>
				<span class="text">Logout</span>
			</a>
		</li>
	</ul>
</section>
<!-- SIDEBAR -->

<!-- CONTENT -->
<section id="content">

	<!-- NAVBAR -->
	<nav>
		<i class='bx bx-menu'></i>

		<input type="checkbox" id="switch-mode" hidden>
		<label for="switch-mode" class="switch-mode"></label>

	</nav>
	<!-- NAVBAR -->

	<!-- MAIN -->
	<main>

		<?php
		$page = $_GET['page'] ?? "";
		$action = $_GET['action'] ?? "";

		if ($page==""){
			include "welcome.php";
		}elseif ($page=="admin"){
			if ($action==""){
				include "tampil_admin.php";
			}elseif ($action=="tambah"){
				include "tambah_admin.php";
			}elseif ($action=="update"){
				include "update_admin.php";
			}else{
				include "hapus_admin.php";
			}
		}elseif ($page=="gejala"){
			if ($action==""){
				include "tampil_gejala.php";
			}elseif ($action=="tambah"){
				include "tambah_gejala.php";
			}elseif ($action=="update"){
				include "update_gejala.php";
			}else{
				include "hapus_gejala.php";
			}
		}elseif ($page=="penyakit"){
			if ($action==""){
				include "tampil_penyakit.php";
			}elseif ($action=="tambah"){
				include "tambah_penyakit.php";
			}elseif ($action=="update"){
				include "update_penyakit.php";
			}else{
				include "hapus_penyakit.php";
			}
		}elseif ($page=="kasus"){
        if ($action==""){
            include "tampil_kasus.php";
        }
		}elseif ($page=="diagnosa"){
			if ($action==""){
				include "diagnosa.php";
			}elseif ($action=="tampil"){
				include "tampil_diagnosa.php";
			}
		}elseif ($page=="hasil_diagnosa"){
        	include "hasil_diagnosa.php";
		}elseif ($page=="hasil_cetak") {
			include "hasil_cetak.php";
		}else{
			include "logout.php";
		}
		?>

	</main>
	<!-- MAIN -->

</section>
<!-- CONTENT -->

<!-- JS -->
<script src="assets/js/jquery-3.7.0.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/datatables.min.js"></script>
<script src="assets/js/all.js"></script>

<script src="script.js"></script>

<script>
$(document).ready(function() {
	$('#myTable').DataTable();
});
</script>

</body>
</html>