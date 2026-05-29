<?php

include '../includes/koneksi.php';

$data = null;

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $query = mysqli_query(
        $koneksi,
        "SELECT * FROM laporan
        WHERE id='$id'"
    );

    $data = mysqli_fetch_assoc($query);
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Tracking Teknisi</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body{

    background:#081120;

}

.card{

    border:none;

    border-radius:20px;

    background:#111827;

    color:white;

}

.preview{

    width:100%;

    max-height:300px;

    object-fit:cover;

    border-radius:15px;

    border:2px solid #2563eb;

}

.step{

    padding:12px 15px;

    margin-bottom:10px;

    border-radius:10px;

    font-weight:600;

}

.step-done{

    background:#198754;

    color:white;

}

.step-active{

    background:#0d6efd;

    color:white;

}

.step-pending{

    background:#374151;

    color:#d1d5db;

}

</style>

</head>

<body>

<div class="container mt-5 mb-5">

<div class="row justify-content-center">

<div class="col-md-8">

<?php if($data){ ?>

<div class="card shadow-lg">

<div class="card-header bg-primary">

<h3 class="mb-0">

📍 Tracking Teknisi

</h3>

</div>

<div class="card-body">

<h5 class="mb-3">

Detail Laporan

</h5>

<hr>

<p>

<strong>ID :</strong>

<?= $data['id']; ?>

</p>

<p>

<strong>Nama Pelapor :</strong>

<?= $data['nama_pelapor']; ?>

</p>

<p>

<strong>Tanggal :</strong>

<?= $data['tanggal']; ?>

</p>

<p>

<strong>Lokasi :</strong>

<?= $data['lokasi']; ?>

</p>

<p>

<strong>Keterangan :</strong>

<?= $data['keterangan']; ?>

</p>

<img
src="../assets/upload/laporan/<?= $data['foto']; ?>"
class="preview mb-4">

<h4 class="mb-4">

🚧 Tracking Teknisi

</h4>

<?php

if($data['status']=="Baru"){

?>

<div class="step step-done">

✓ Laporan Diterima

</div>

<div class="step step-active">

⏳ Menunggu Penugasan Teknisi

</div>

<div class="step step-pending">

📍 Teknisi Menuju Lokasi

</div>

<div class="step step-pending">

🔧 Perbaikan Lampu

</div>

<div class="step step-pending">

✅ Selesai

</div>

<div class="progress mt-3">

<div
class="progress-bar bg-warning"
style="width:20%">

20%

</div>

</div>

<?php

}elseif($data['status']=="Diproses"){

?>

<div class="step step-done">

✓ Laporan Diterima

</div>

<div class="step step-done">

✓ Teknisi Ditugaskan

</div>

<div class="step step-active">

📍 Teknisi Menuju Lokasi

</div>

<div class="step step-pending">

🔧 Perbaikan Lampu

</div>

<div class="step step-pending">

✅ Selesai

</div>

<div class="progress mt-3">

<div
class="progress-bar bg-info"
style="width:70%">

70%

</div>

</div>

<?php

}else{

?>

<div class="step step-done">

✓ Laporan Diterima

</div>

<div class="step step-done">

✓ Teknisi Ditugaskan

</div>

<div class="step step-done">

✓ Teknisi Menuju Lokasi

</div>

<div class="step step-done">

✓ Perbaikan Lampu

</div>

<div class="step step-done">

✓ Selesai

</div>

<div class="progress mt-3">

<div
class="progress-bar bg-success"
style="width:100%">

100%

</div>

</div>

<?php } ?>

<br>

<a href="../index.php"
class="btn btn-secondary">

← Kembali ke Beranda

</a>

</div>

</div>

<?php }else{ ?>

<div class="card">

<div class="card-body">

<div class="alert alert-danger">

ID laporan tidak ditemukan.

</div>

<a href="../index.php"
class="btn btn-secondary">

Kembali

</a>

</div>

</div>

<?php } ?>

</div>

</div>

</div>

</body>
</html>

