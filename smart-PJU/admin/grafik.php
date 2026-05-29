```php
<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}

include '../includes/koneksi.php';

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

$data_bulan = mysqli_query(
    $koneksi,
    "SELECT
    MONTH(tanggal) as bulan,
    COUNT(*) as total
    FROM laporan
    GROUP BY MONTH(tanggal)"
);

$bulan = [];
$total = [];

while($d = mysqli_fetch_assoc($data_bulan)){

    $nama_bulan = [
        1=>'Jan',
        2=>'Feb',
        3=>'Mar',
        4=>'Apr',
        5=>'Mei',
        6=>'Jun',
        7=>'Jul',
        8=>'Agu',
        9=>'Sep',
        10=>'Okt',
        11=>'Nov',
        12=>'Des'
    ];

    $bulan[] = $nama_bulan[$d['bulan']];
    $total[] = $d['total'];
}

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Grafik Laporan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

body{
    background:#081120;
}

.card{
    border:none;
    border-radius:20px;
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

            <div class="ms-auto">

                <a href="dashboard.php"
                class="btn btn-primary me-2">

                Dashboard

                </a>

                <a href="laporan.php"
                class="btn btn-info me-2">

                Data Laporan

                </a>

                <a href="../logout.php"
                class="btn btn-danger">

                Logout

                </a>

            </div>

        </div>

    </nav>

    <h2 class="text-white mb-4">

        Grafik Pelaporan Lampu Jalan

    </h2>

    <div class="row">

        <div class="col-md-6 mb-4">

            <div class="card shadow-lg">

                <div class="card-body">

                    <h5>
                        Status Laporan
                    </h5>

                    <canvas id="pieChart"></canvas>

                </div>

            </div>

        </div>

        <div class="col-md-6 mb-4">

            <div class="card shadow-lg">

                <div class="card-body">

                    <h5>
                        Laporan Per Bulan
                    </h5>

                    <canvas id="barChart"></canvas>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

new Chart(
document.getElementById('pieChart'),
{
type:'pie',

data:{
labels:[
'Baru',
'Diproses',
'Selesai'
],

datasets:[{

data:[
<?= $baru ?>,
<?= $proses ?>,
<?= $selesai ?>
],

backgroundColor:[
'#f59e0b',
'#06b6d4',
'#10b981'
]

}]
}
});

new Chart(
document.getElementById('barChart'),
{

type:'bar',

data:{

labels:
<?= json_encode($bulan) ?>,

datasets:[{

label:'Jumlah Laporan',

data:
<?= json_encode($total) ?>,

backgroundColor:'#2563eb'

}]
}

});

</script>

</body>
</html>
```
