<?php
include 'config.php';

$penyakit = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM penyakit"));
$gejala   = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM gejala"));
$kasus    = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kasus"));
$hasil    = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM hasil_diagnosa"));
?>

<style>
body{
  background:#f4f6f9;
}

.hero-cbr{
  background: linear-gradient(135deg,#0d6efd,#00c6ff);
  color:#fff;
  padding:50px;
  border-radius:18px;
  margin-bottom:35px;
}
.hero-cbr h1{
  font-weight:700;
}
.hero-cbr p{
  max-width:700px;
}
.hero-badge span{
  background:rgba(255,255,255,.2);
  padding:6px 16px;
  border-radius:20px;
  margin-right:8px;
  font-size:12px;
}

.dashboard-card{
  border:none;
  border-radius:16px;
  box-shadow:0 6px 15px rgba(0,0,0,.08);
  transition:.3s;
}
.dashboard-card:hover{
  transform:translateY(-6px);
  box-shadow:0 15px 30px rgba(0,0,0,.15);
}
.dashboard-card .card-body{
  display:flex;
  gap:15px;
  align-items:center;
}
.dashboard-icon{
  width:55px;
  height:55px;
  border-radius:14px;
  display:flex;
  align-items:center;
  justify-content:center;
  font-size:22px;
  color:#fff;
}
.bg-blue{background:#0d6efd;}
.bg-green{background:#198754;}
.bg-orange{background:#fd7e14;}
.bg-purple{background:#6f42c1;}

.dashboard-title{
  font-size:13px;
  color:#6c757d;
  text-transform:uppercase;
}
.dashboard-value{
  font-size:28px;
  font-weight:700;
}

.cbr-flow{
  display:flex;
  justify-content:center;
  align-items:center;
  flex-wrap:wrap;
  gap:10px;
}
.flow-box{
  background:#fff;
  padding:16px 22px;
  border-radius:14px;
  text-align:center;
  box-shadow:0 5px 15px rgba(0,0,0,.1);
  min-width:140px;
}
.flow-box strong{
  display:block;
  margin-bottom:5px;
}
.arrow{
  font-size:28px;
  font-weight:bold;
  color:#0d6efd;
}
</style>

<div class="container-fluid">

  <div class="hero-cbr">
    <h1>Diagnosis Penyakit FLUTD</h1>
    <p>
      Sistem ini berbasis <b>Case Based Reasoning (CBR)</b> yang
      memanfaatkan pengalaman kasus terdahulu untuk membantu
      proses diagnosis penyakit pada kucing secara cepat dan akurat.
    </p>
    <div class="hero-badge mt-3">
      <span>Expert System</span>
      <span>CBR Method</span>
      <span>FLUTD</span>
    </div>
  </div>

  <div class="row g-4 mb-4">

    <div class="col-md-3">
      <div class="card dashboard-card">
        <div class="card-body">
          <div class="dashboard-icon bg-blue">
            <i class="fas fa-virus"></i>
          </div>
          <div>
            <div class="dashboard-title">Data Penyakit</div>
            <div class="dashboard-value" data-count="<?= $penyakit ?>">0</div>
            <small class="text-muted">Total penyakit</small>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card dashboard-card">
        <div class="card-body">
          <div class="dashboard-icon bg-green">
            <i class="fas fa-notes-medical"></i>
          </div>
          <div>
            <div class="dashboard-title">Data Gejala</div>
            <div class="dashboard-value" data-count="<?= $gejala ?>">0</div>
            <small class="text-muted">Total gejala</small>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card dashboard-card">
        <div class="card-body">
          <div class="dashboard-icon bg-orange">
            <i class="fas fa-folder-open"></i>
          </div>
          <div>
            <div class="dashboard-title">Data Kasus</div>
            <div class="dashboard-value" data-count="<?= $kasus ?>">0</div>
            <small class="text-muted">Basis kasus CBR</small>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card dashboard-card">
        <div class="card-body">
          <div class="dashboard-icon bg-purple">
            <i class="fas fa-clipboard-check"></i>
          </div>
          <div>
            <div class="dashboard-title">Hasil Diagnosa</div>
            <div class="dashboard-value" data-count="<?= $hasil ?>">0</div>
            <small class="text-muted">Riwayat diagnosa</small>
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="card mb-4 shadow-sm">
    <div class="card-body">
      <h5 class="text-center mb-3">Alur Metode Case Based Reasoning (CBR)</h5>
      <div class="cbr-flow">
        <div class="flow-box">
          <strong>Retrieve</strong>
          Ambil kasus lama
        </div>
        <div class="arrow">→</div>
        <div class="flow-box">
          <strong>Reuse</strong>
          Hitung kemiripan
        </div>
        <div class="arrow">→</div>
        <div class="flow-box">
          <strong>Revise</strong>
          Evaluasi hasil
        </div>
        <div class="arrow">→</div>
        <div class="flow-box">
          <strong>Retain</strong>
          Simpan kasus baru
        </div>
      </div>
    </div>
  </div>

  <div class="card shadow-sm">
    <div class="card-body text-center">
      <h5>Tentang Sistem</h5>
      <hr class="w-50 mx-auto">
      <p class="text-muted mb-0">
        Sistem ini dirancang untuk membantu pengguna dalam
        melakukan diagnosis awal penyakit FLUTD pada kucing
        berdasarkan tingkat kemiripan kasus sebelumnya
        menggunakan metode Case Based Reasoning (CBR).
      </p>
    </div>
  </div>

</div>

<script>
document.querySelectorAll('[data-count]').forEach(el=>{
  let target = +el.dataset.count;
  let count = 0;
  let speed = target / 40;

  let interval = setInterval(()=>{
    count += speed;
    if(count >= target){
      el.innerText = target;
      clearInterval(interval);
    }else{
      el.innerText = Math.floor(count);
    }
  },30);
});
</script>