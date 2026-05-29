<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}

include '../includes/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query(
    $koneksi,
    "SELECT * FROM laporan
    WHERE id='$id'"
);

$d = mysqli_fetch_assoc($data);

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Detail Laporan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://unpkg.com/leaflet/dist/leaflet.css"/>

<style>

body{
    background:#f4f8ff;
}

.card{
    border:none;
    border-radius:20px;
}

#map{
    height:400px;
    border-radius:15px;
}

img{
    border-radius:15px;
}

</style>

</head>

<body>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h3>Detail Laporan Lampu Jalan Mati</h3>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6">

                    <h5>Informasi Pelapor</h5>

                    <hr>

                    <p>
                        <strong>Nama :</strong>
                        <?= $d['nama_pelapor']; ?>
                    </p>

                    <p>
                        <strong>No HP :</strong>
                        <?= $d['no_hp']; ?>
                    </p>

                    <p>
                        <strong>Status :</strong>

                        <?php

                        if($d['status']=="Baru"){
                            echo "<span class='badge bg-warning'>Baru</span>";
                        }

                        if($d['status']=="Diproses"){
                            echo "<span class='badge bg-info'>Diproses</span>";
                        }

                        if($d['status']=="Selesai"){
                            echo "<span class='badge bg-success'>Selesai</span>";
                        }

                        ?>

                    </p>

                    <p>
                        <strong>Tanggal :</strong>
                        <?= $d['tanggal']; ?>
                    </p>

                    <p>
                        <strong>Keterangan :</strong><br>
                        <?= $d['keterangan']; ?>
                    </p>

                    <p>
                        <strong>Koordinat :</strong><br>

                        <?= $d['latitude']; ?> ,
                        <?= $d['longitude']; ?>

                    </p>

                    <a
                    target="_blank"
                    href="https://www.google.com/maps?q=<?=$d['latitude']?>,<?=$d['longitude']?>"
                    class="btn btn-success">

                    📍 Buka di Google Maps

                    </a>

                </div>

                <div class="col-md-6">

                    <h5>Foto Lampu</h5>

                    <hr>

                    <img
                    src="../assets/upload/laporan/<?= $d['foto']; ?>"
                    class="img-fluid">

                </div>

            </div>

            <hr>

            <h5>Lokasi Lampu di Peta</h5>

            <div id="map"></div>

            <br>

            <a href="laporan.php"
               class="btn btn-secondary">

               Kembali

            </a>

        </div>

    </div>

</div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>

let lat = <?= $d['latitude']; ?>;
let lng = <?= $d['longitude']; ?>;

let map = L.map('map').setView([lat, lng], 18);

L.tileLayer(
'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
{
attribution:'© OpenStreetMap'
}
).addTo(map);

L.marker([lat, lng])
.addTo(map)
.bindPopup('Lokasi Lampu Jalan Mati')
.openPopup();

</script>

</body>
</html>