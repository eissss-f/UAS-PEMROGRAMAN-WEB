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

if(file_exists(
"../assets/upload/laporan/".$d['foto']
)){
    unlink(
    "../assets/upload/laporan/".$d['foto']
    );
}

mysqli_query(
    $koneksi,
    "DELETE FROM laporan
    WHERE id='$id'"
);

echo "

<script>

alert('Laporan berhasil dihapus');

window.location='laporan.php';

</script>

";

?>