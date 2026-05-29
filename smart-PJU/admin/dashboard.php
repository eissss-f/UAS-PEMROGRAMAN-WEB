```php
<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}

include '../includes/koneksi.php';

$total = mysqli_num_rows(
    mysqli_query(
        $koneksi,
        "SELECT * FROM laporan"
    )
);

$baru = mysqli_num_rows(
    mysqli_query(
        $koneksi,
        "SELECT * FROM laporan
         WHERE status='Baru'"
    )
);

$proses = mysqli_num_rows(
    mysqli_query(
        $koneksi,
        "SELECT * FROM laporan
         WHERE status='Diproses'"
    )
);

$selesai = mysqli_num_rows(
    mysqli_query(
        $koneksi,
        "SELECT * FROM laporan
         WHERE status='Selesai'"
    )
);

$laporan = mysqli_query(
    $koneksi,
    "SELECT * FROM laporan
     ORDER BY id DESC
     LIMIT 5"
);

?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>Dashboard Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body{
    background:#081120;
}

.card-dashboard{
    border:none;
    border-radius:20px;
}

.table{
    margin-bottom:0;
}

</style>

</head>

<body>

<div class="container-fluid p-4">

    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg navbar-dark mb-4"
    style="
    background:#111827;
    border-radius:20px;
    ">

        <div class="container-fluid">

            <a class="navbar-brand fw-bold">

                💡 Smart PJU Admin

            </a>

            <button
            class="navbar-toggler"
            data-bs-toggle="collapse"
            data-bs-target="#menu">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div
            class="collapse navbar-collapse"
            id="menu">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">

                        <a
                        class="nav-link active"
                        href="dashboard.php">

                        Dashboard

                        </a>

                    </li>

                    <li class="nav-item">

                        <a
                        class="nav-link"
                        href="laporan.php">

                        Data Laporan

                        </a>

                    </li>

                    <li class="nav-item">

                        <a
                        class="nav-link"
                        href="grafik.php">

                        Grafik Laporan

                        </a>

                    </li>

                    <li class="nav-item ms-3">

                        <a
                        href="../logout.php"
                        class="btn btn-danger">

                        Logout

                        </a>

                    </li>

                </ul>

            </div>

        </div>

    </nav>

    <!-- Judul -->

    <div class="mb-4">

        <h2 class="text-white fw-bold">
            Dashboard Smart PJU
        </h2>

        <p class="text-secondary">
            Monitoring Pelaporan Lampu Jalan Mati
        </p>

    </div>

    <!-- Statistik -->

    <div class="row g-4">

        <div class="col-md-3">

            <div
            class="card card-dashboard text-white shadow-lg"
            style="background:linear-gradient(135deg,#2563eb,#1e40af);">

                <div class="card-body">

                    <h6>Total Laporan</h6>

                    <h1><?= $total ?></h1>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div
            class="card card-dashboard text-white shadow-lg"
            style="background:linear-gradient(135deg,#f59e0b,#d97706);">

                <div class="card-body">

                    <h6>Laporan Baru</h6>

                    <h1><?= $baru ?></h1>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div
            class="card card-dashboard text-white shadow-lg"
            style="background:linear-gradient(135deg,#06b6d4,#0891b2);">

                <div class="card-body">

                    <h6>Diproses</h6>

                    <h1><?= $proses ?></h1>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div
            class="card card-dashboard text-white shadow-lg"
            style="background:linear-gradient(135deg,#10b981,#059669);">

                <div class="card-body">

                    <h6>Selesai</h6>

                    <h1><?= $selesai ?></h1>

                </div>

            </div>

        </div>

    </div>

    <!-- Tabel -->

    <div
    class="card border-0 shadow-lg mt-4"
    style="background:#111827;">

        <div class="card-body">

            <h4 class="text-white mb-4">

                Data Laporan Terbaru

            </h4>

            <div class="table-responsive">

                <table class="table table-dark table-hover">

                    <thead>

                        <tr>

                            <th>ID</th>
                            <th>Pelapor</th>
                            <th>Lokasi</th>
                            <th>Status</th>
                            <th>Tanggal</th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php while($d=mysqli_fetch_assoc($laporan)){ ?>

                        <tr>

                            <td><?= $d['id']; ?></td>

                            <td><?= $d['nama_pelapor']; ?></td>

                            <td><?= $d['lokasi']; ?></td>

                            <td>

                            <?php

                            if($d['status']=="Baru"){

                                echo "<span class='badge bg-warning'>Baru</span>";

                            }elseif($d['status']=="Diproses"){

                                echo "<span class='badge bg-info'>Diproses</span>";

                            }else{

                                echo "<span class='badge bg-success'>Selesai</span>";

                            }

                            ?>

                            </td>

                            <td><?= $d['tanggal']; ?></td>

                        </tr>

                    <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
```
