
<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}

include '../includes/koneksi.php';

$cari = "";

if(isset($_GET['cari'])){
    $cari = $_GET['cari'];

    $data = mysqli_query(
        $koneksi,
        "SELECT * FROM laporan
        WHERE nama_pelapor LIKE '%$cari%'
        OR lokasi LIKE '%$cari%'
        ORDER BY id DESC"
    );

}else{

    $data = mysqli_query(
        $koneksi,
        "SELECT * FROM laporan
        ORDER BY id DESC"
    );

}

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Data Laporan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<style>

body{
    background:#081120;
}

h2{
    color:white;
}

.card{

    border:none;
    border-radius:20px;

    background:#111827;

    color:white;

}

.preview{

    width:100px;
    height:70px;

    object-fit:cover;

    border-radius:10px;

    border:2px solid #2563eb;

}

.form-control{

    background:#1f2937;
    border:none;
    color:white;

}

.form-control:focus{

    background:#1f2937;
    color:white;

    box-shadow:none;

    border:1px solid #2563eb;

}

.table{

    color:white;

}

.table th{

    background:#1e3a8a !important;

    color:white;

    border:none;

}

.table td{

    background:#111827;

    border-color:#374151;

    vertical-align:middle;

}

.table tbody tr:hover td{

    background:#1f2937;

}

.btn-primary{

    background:#2563eb;
    border:none;

}

.btn-primary:hover{

    background:#1d4ed8;

}

.btn-info{

    background:#06b6d4;
    border:none;
    color:white;

}

.btn-warning{

    color:white;

}

.shadow{

    box-shadow:
    0 10px 30px rgba(0,0,0,.4)!important;

}
.table,
.table tbody,
.table tr,
.table td,
.table th{

    color:white !important;

}

.table-bordered{

    border-color:#374151 !important;

}

.table > :not(caption) > * > *{

    background:#111827 !important;

    color:white !important;

}

.table-hover tbody tr:hover td{

    color:white !important;

}

.text-dark{

    color:white !important;

}

</style>



</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Data Laporan Lampu Jalan Mati</h2>

        <div>

            <a href="dashboard.php"
               class="btn btn-primary">

               Dashboard

            </a>

            <a href="../logout.php"
               class="btn btn-danger">

               Logout

            </a>

        </div>

    </div>

    <div class="card shadow">

        <div class="card-body">

            <form method="GET" class="mb-4">

                <div class="input-group">

                    <input
                    type="text"
                    name="cari"
                    class="form-control"
                    placeholder="Cari nama atau lokasi..."
                    value="<?= $cari ?>">

                    <button
                    class="btn btn-primary">

                    Cari

                    </button>

                </div>

            </form>

            <div class="table-responsive">

                <table class="table table-bordered align-middle">

                    <thead class="table-primary">

                        <tr>

                            <th>ID</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php while($d = mysqli_fetch_assoc($data)){ ?>

                    <tr>

                        <td>
                            <?= $d['id']; ?>
                        </td>

                        <td>

                            <img
                            src="../assets/upload/laporan/<?= $d['foto']; ?>"
                            class="preview">

                        </td>

                        <td>

                            <?= $d['nama_pelapor']; ?>

                        </td>

                        <td>

                            <?= $d['no_hp']; ?>

                        </td>

                        <td>

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

                        </td>

                        <td>

                            <?= $d['tanggal']; ?>

                        </td>

                        <td>

    <a
    href="detail.php?id=<?= $d['id']; ?>"
    class="btn btn-info btn-sm">

    Detail

    </a>

    <a
    href="update_status.php?id=<?= $d['id']; ?>"
    class="btn btn-warning btn-sm">

    Status

    </a>

    <a
    target="_blank"
    href="https://www.google.com/maps?q=<?= $d['latitude']; ?>,<?= $d['longitude']; ?>"
    class="btn btn-success btn-sm">

    Maps

    </a>

    <a
    href="hapus.php?id=<?= $d['id']; ?>"
    class="btn btn-danger btn-sm"
    onclick="return confirm('Yakin ingin menghapus laporan ini?')">

    Hapus

    </a>

</td>

                    </tr>

                    <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</body>
</html>
```
