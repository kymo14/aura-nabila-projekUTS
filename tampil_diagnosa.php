<?php
include "config.php";

$nama = $_POST['nama_pengguna']??'';
$gejalaDipilih = $_POST['gejala']??[];

if(count($gejalaDipilih)==0){
    echo "<h3 align='center'>Tidak ada gejala yang dipilih</h3>";
    exit;
}
?>
<h4><strong>GEJALA YANG DIPILIH</strong></h4>

<table class="table table-bordered">
    <?php
    $no = 1;
    $idGejalaSQL = "'" . implode("','", $gejalaDipilih) . "'";
    $qGejala = mysqli_query(
        $conn,
        "SELECT nama_gejala FROM gejala WHERE id_gejala IN ($idGejalaSQL)"
    );

    while ($g = mysqli_fetch_assoc($qGejala)){
        echo "<tr>
                <td width='30'>$no</td>
                <td>{$g['nama_gejala']}</td>
            </tr>";
        $no++;
    }
    ?>
</table>
<hr>
<h4><strong>PROSES PERHITUNGAN</strong></h4>

<table class="table table-bordered">
    <tr>
        <th>ID KASUS</th>
        <th>JUMLAH GEJALA KASUS</th>
        <th>GEJALA COCOK</th>
        <th>JUMLAH BOBOT COCOK</th>
        <th>TOTAL BOBOT</th>
        <th>SIMILARITY</th>
        <th>HASIL</th>
    </tr>

    <?php
    $hasil = [];
    //ambil total bobot per kasus
    $qKasus = mysqli_query($conn,
        "SELECT k.id_kasus, k.id_penyakit, SUM(g.bobot) AS total_bobot
        FROM kasus k
        JOIN gejala g ON k.id_gejala = g.id_gejala
        GROUP BY k.id_kasus"
    );
    while($k = mysqli_fetch_assoc($qKasus)){
        $idKasus = $k['id_kasus'];
        $idPenyakit = $k['id_penyakit'];
        $totalBobot = $k['total_bobot'];

        //gejala dalam kasus
        $qDetail = mysqli_query($conn,
            "SELECT g.id_gejala, g.bobot
            FROM kasus k
            JOIN gejala g ON k.id_gejala = g.id_gejala
            WHERE k.id_kasus = '$idKasus'"
        );

        $jmlGejalaKasus = 0;
        $jmlGejalaCocok = 0;
        $bobotCocok = 0;

        while($d = mysqli_fetch_assoc($qDetail)){
            $jmlGejalaKasus++;
            if (in_array($d['id_gejala'], $gejalaDipilih)){
                $jmlGejalaCocok++;
                $bobotCocok += $d['bobot'];
            }
        }

        $similarity = ($totalBobot > 0) ? $bobotCocok / $totalBobot : 0;

        $hasil[] = [
            'id_kasus' => $idKasus,
            'id_penyakit' => $idPenyakit,
            'nilai' => $similarity
        ];

        echo "<tr>
                <td><strong>$idKasus</strong></td>
                <td>$jmlGejalaKasus</td>
                <td>$jmlGejalaCocok</td>
                <td>$bobotCocok</td>
                <td>$totalBobot</td>
                <td>$bobotCocok / $totalBobot = <strong>".round($similarity,3)."</strong></td>
                <td><strong>".round($similarity * 100, 2)." %</strong></td>
            </tr>";
    }
    ?>
</table>
<hr>
<h4><strong>HASIL DIAGNOSA</strong></h4>

<table class="table table-bordered">
    <tr>
        <th>RANGKING</th>
        <th>ID KASUS</th>
        <th>PENYAKIT</th>
        <th>HASIL</th>
    </tr>

    <?php
    usort($hasil, fn($a,$b) => $b['nilai'] <=> $a['nilai']);

    $rank = 1;
    foreach ($hasil as $h){
        $qP = mysqli_query($conn,
            "SELECT nama_penyakit FROM penyakit
            WHERE id_penyakit='{$h['id_penyakit']}'"
        );
        $p = mysqli_fetch_assoc($qP);

        echo "<tr>
                <td>$rank</td>
                <td>{$h['id_kasus']}</td>
                <td>{$p['nama_penyakit']}</td>
                <td>".round($h['nilai'] * 100, 2)." %</td>
            </tr>";
        $rank++;
    }
    ?>
</table>
<hr>
<h4>
    Penyakit yang diderita <?= $nama ?> adalah <?= $p['nama_penyakit']; ?> dengan nilai similarity tertinggi <?= round($hasil[0]['nilai'] * 100, 2); ?> %
</h4>

<?php
// menyimpan diagnosa
if (!empty($hasil)) {

    // mengambil nilai tertinggi
    $hasilTerbaik = $hasil[0];

    $idPenyakit = $hasilTerbaik['id_penyakit'];
    $nilaiAkhir = round($hasilTerbaik['nilai'] * 100, 2);

    // menambah id hasil
    $qID = mysqli_query($conn, "SELECT MAX(CAST(id_hasil AS UNSIGNED)) AS total FROM hasil_diagnosa");
    $dID = mysqli_fetch_assoc($qID);
    $idHasil = (string) (($dID['total'] ?? 0) + 1);

    // menyimpan ke hasil_diagnosa
    mysqli_query($conn, "
        INSERT INTO hasil_diagnosa 
        (id_hasil, nama_pengguna, id_penyakit, nilai) 
        VALUES 
        ('$idHasil', '$nama', '$idPenyakit', '$nilaiAkhir')
    ");
}
?>