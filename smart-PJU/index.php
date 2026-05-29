<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart PJU - Sistem Pelaporan Lampu Jalan Mati</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<!-- Modal Tracking -->
<div class="modal fade" id="trackingModal" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Cek Status Laporan
                </h5>

                <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <form action="pelapor/tracking.php" method="GET">

                    <div class="mb-3">

                        <label class="form-label">

                            Masukkan ID Laporan

                        </label>

                        <input
                        type="number"
                        name="id"
                        class="form-control"
                        placeholder="Contoh: 15"
                        required>

                    </div>

                    <button
                    type="submit"
                    class="btn btn-primary w-100">

                    Cek Status

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">

        <a class="navbar-brand fw-bold" href="#">
            <i class="bi bi-lightbulb-fill"></i>
            Smart PJU
        </a>

        <button class="navbar-toggler" data-bs-toggle="collapse"
        data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="#fitur">Fitur</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#alur">Alur</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#tentang">Tentang</a>
                </li>

                <li class="nav-item ms-3">
                    <a href="login.php" class="btn btn-light">
                        Login Admin
                    </a>
                </li>

            </ul>

        </div>

    </div>
</nav>

<!-- Hero -->
<section class="hero">

<div class="container">

<div class="hero-content">

<div class="mb-4">

<i class="bi bi-lightbulb-fill"
style="
font-size:80px;
color:#60a5fa;
text-shadow:0 0 30px #60a5fa;
"></i>

</div>

<h1>

Sistem Pelaporan
<br>
Lampu Jalan Mati

</h1>

<p>

Laporkan lampu jalan yang rusak dengan cepat,
mudah, dan akurat.

</p>

<a href="pelapor/tambah_laporan.php"
class="btn btn-primary hero-btn me-3">

📢 Laporkan Sekarang

</a>

<button
class="btn btn-outline-light hero-btn"
data-bs-toggle="modal"
data-bs-target="#trackingModal">

🔍 Cek Status

</button>

</div>

</div>

</section>

<!-- Fitur -->
<section id="fitur" class="py-5">

<div class="container">

<h2 class="text-center fw-bold mb-5">
Fitur Utama
</h2>

<div class="row g-4">

<div class="col-md-3" data-aos="fade-up">

<div class="card fitur-card text-center p-4">

<i class="bi bi-geo-alt-fill fitur-icon"></i>

<h5>GPS Otomatis</h5>

<p>
Lokasi kerusakan terdeteksi secara otomatis.
</p>

</div>

</div>

<div class="col-md-3" data-aos="fade-up">

<div class="card fitur-card text-center p-4">

<i class="bi bi-camera-fill fitur-icon"></i>

<h5>Upload Foto</h5>

<p>
Unggah foto kondisi lampu yang rusak.
</p>

</div>

</div>

<div class="col-md-3" data-aos="fade-up">

<div class="card fitur-card text-center p-4">

<i class="bi bi-bar-chart-fill fitur-icon"></i>

<h5>Grafik Laporan</h5>

<p>
Data pelaporan tersaji dalam grafik.
</p>

</div>

</div>

<div class="col-md-3" data-aos="fade-up">

<div class="card fitur-card text-center p-4">

<i class="bi bi-check-circle-fill fitur-icon"></i>

<h5>Tracking Status</h5>

<p>
Pantau perkembangan laporan secara realtime.
</p>

</div>

</div>

</div>

</div>

</section>

<!-- Alur -->
<section id="alur" class="bg-light py-5">

<div class="container">

<h2 class="text-center fw-bold mb-5">
Alur Pelaporan
</h2>

<div class="row text-center">

<div class="col-md-3">
<h1>1</h1>
<p>Isi Form Laporan</p>
</div>

<div class="col-md-3">
<h1>2</h1>
<p>Upload Foto</p>
</div>

<div class="col-md-3">
<h1>3</h1>
<p>Admin Memproses</p>
</div>

<div class="col-md-3">
<h1>4</h1>
<p>Lampu Diperbaiki</p>
</div>

</div>

</div>

</section>

<!-- Tentang -->
<section id="tentang" class="py-5">

<div class="container text-center">

<h2 class="fw-bold mb-4">
Tentang Smart PJU
</h2>

<p>
Smart PJU merupakan sistem berbasis web yang membantu
masyarakat melaporkan lampu jalan mati secara cepat dan
memudahkan petugas dalam melakukan perbaikan.
</p>

</div>

</section>

<!-- Footer -->
<footer class="bg-primary text-white text-center py-3">

<p class="mb-0">
© 2026 Smart PJU - Sistem Pelaporan Lampu Jalan Mati
</p>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>
AOS.init({
    duration:1000
});
</script>

</body>
</html>