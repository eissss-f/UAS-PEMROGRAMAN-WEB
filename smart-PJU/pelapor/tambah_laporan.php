<?php


include '../includes/koneksi.php';

if(isset($_POST['simpan'])){

    $nama       = mysqli_real_escape_string($koneksi,$_POST['nama']);
    $hp         = mysqli_real_escape_string($koneksi,$_POST['hp']);
    $lokasi     = mysqli_real_escape_string($koneksi,$_POST['lokasi']);
    $latitude   = mysqli_real_escape_string($koneksi,$_POST['latitude']);
    $longitude  = mysqli_real_escape_string($koneksi,$_POST['longitude']);
    $keterangan = mysqli_real_escape_string($koneksi,$_POST['keterangan']);

    $foto = "";

    if(isset($_FILES['foto']) && $_FILES['foto']['error'] == 0){

        $folder = dirname(__DIR__) . "/assets/upload/laporan/";

        if(!file_exists($folder)){
            mkdir($folder,0777,true);
        }

        $foto = time().'_'.basename($_FILES['foto']['name']);

        move_uploaded_file(
            $_FILES['foto']['tmp_name'],
            $folder.$foto
        );

    }

    $query = mysqli_query(
        $koneksi,
        "INSERT INTO laporan
        (
            nama_pelapor,
            no_hp,
            lokasi,
            foto,
            keterangan,
            status,
            latitude,
            longitude
        )
        VALUES
        (
            '$nama',
            '$hp',
            '$lokasi',
            '$foto',
            '$keterangan',
            'Baru',
            '$latitude',
            '$longitude'
        )"
    );

    if($query){


            $id_laporan = mysqli_insert_id($koneksi);
        
            echo "
        
            <!DOCTYPE html>
            <html>
            <head>
        
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        
            </head>
            <body>
        
            <script>
        
            Swal.fire({
        
                icon:'success',
        
                title:'Laporan Berhasil!',
        
                html:'ID Laporan Anda : <b>$id_laporan</b><br><br>Simpan ID ini untuk mengecek status laporan.',
        
                confirmButtonColor:'#0d6efd'
        
            }).then(function(){
        
                window.location='../index.php';
        
            });
        
            </script>
        
            </body>
            </html>
        
            ";
        
            exit;
        
        }else{
        
            die(mysqli_error($koneksi));
        
        }      
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Pelaporan Lampu Jalan Mati</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://unpkg.com/leaflet/dist/leaflet.css"/>

<style>

body{
    background:#f4f8ff;
}

.card-form{
    border:none;
    border-radius:20px;
    box-shadow:0 10px 25px rgba(0,0,0,.1);
}

#map{
    height:400px;
    border-radius:15px;
    border:1px solid #ddd;
}

</style>

</head>

<body>

<div class="container mt-5 mb-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card card-form">

                <div class="card-header bg-primary text-white">

                    <h3>
                        Form Pelaporan Lampu Jalan Mati
                    </h3>

                </div>

                <div class="card-body">

                    <form method="POST"
                          enctype="multipart/form-data">

                        <div class="mb-3">

                            <label class="form-label">
                                Nama Pelapor
                            </label>

                            <input
                                type="text"
                                name="nama"
                                class="form-control"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Nomor HP
                            </label>

                            <input
                                type="text"
                                name="hp"
                                class="form-control"
                                required>

                        </div>

                        <div class="mb-3">

                            <button
                                type="button"
                                class="btn btn-success"
                                onclick="ambilLokasi()">

                                📍 Ambil Lokasi GPS

                            </button>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Lokasi GPS
                            </label>

                            <input
                                type="text"
                                id="lokasi"
                                name="lokasi"
                                class="form-control"
                                readonly
                                required>

                        </div>

                        <input
                            type="hidden"
                            id="latitude"
                            name="latitude">

                        <input
                            type="hidden"
                            id="longitude"
                            name="longitude">

                        <div class="mb-3">

                            <label class="form-label">
                                Peta Lokasi
                            </label>

                            <div id="map"></div>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Foto Lampu
                            </label>

                            <input
                                type="file"
                                name="foto"
                                class="form-control"
                                accept="image/*"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Keterangan Kerusakan
                            </label>

                            <textarea
                                name="keterangan"
                                rows="4"
                                class="form-control"
                                required></textarea>

                        </div>

                        <button
                            type="submit"
                            name="simpan"
                            class="btn btn-primary">

                            Kirim Laporan

                        </button>

                        <a href="../index.php"
                           class="btn btn-secondary">

                           Kembali

                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>

let map;
let marker;

function ambilLokasi(){

    if(navigator.geolocation){

        navigator.geolocation.getCurrentPosition(

            function(position){

                let lat = position.coords.latitude;
                let lng = position.coords.longitude;

                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lng;

                document.getElementById('lokasi').value =
                "Latitude: " + lat +
                " | Longitude: " + lng;

                if(map){
                    map.remove();
                }

                map = L.map('map').setView([lat, lng], 18);

                L.tileLayer(
                    'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                    {
                        attribution:'© OpenStreetMap'
                    }
                ).addTo(map);

                marker = L.marker([lat, lng])
                    .addTo(map)
                    .bindPopup('Lokasi Lampu Jalan Mati')
                    .openPopup();

            },

            function(error){

                alert(
                    'Aktifkan GPS dan izinkan akses lokasi.'
                );

            }

        );

    }else{

        alert(
            'Browser tidak mendukung GPS.'
        );

    }

}

</script>

</body>
</html>