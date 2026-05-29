<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}

include '../includes/koneksi.php';

$id = $_GET['id'];

if(isset($_POST['update'])){

    $status = $_POST['status'];

    mysqli_query(
        $koneksi,
        "UPDATE laporan
         SET status='$status'
         WHERE id='$id'"
    );

    header("Location: laporan.php");
    exit;
}

$data = mysqli_query(
    $koneksi,
    "SELECT * FROM laporan
     WHERE id='$id'"
);

$d = mysqli_fetch_assoc($data);

?>

<!DOCTYPE html>
<html>
<head>

<title>Update Status</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-warning">

            <h3>Update Status Laporan</h3>

        </div>

        <div class="card-body">

            <form method="POST">

                <label>Status</label>

                <select
                    name="status"
                    class="form-select">

                    <option value="Baru">
                        Baru
                    </option>

                    <option value="Diproses">
                        Diproses
                    </option>

                    <option value="Selesai">
                        Selesai
                    </option>

                </select>

                <br>

                <button
                    type="submit"
                    name="update"
                    class="btn btn-success">

                    Simpan

                </button>

                <a href="laporan.php"
                   class="btn btn-secondary">

                   Kembali

                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>