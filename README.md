# 💡 Smart PJU

Smart PJU (Penerangan Jalan Umum) adalah aplikasi berbasis web yang digunakan untuk membantu masyarakat melaporkan lampu jalan yang rusak atau mati secara cepat dan mudah. Sistem ini memanfaatkan lokasi GPS otomatis, unggah foto kondisi lampu, serta fitur monitoring laporan oleh admin.

## 📌 Latar Belakang

Lampu jalan yang rusak sering kali tidak segera diketahui oleh petugas sehingga dapat mengganggu keamanan dan kenyamanan pengguna jalan. Oleh karena itu, diperlukan sistem pelaporan yang memungkinkan masyarakat mengirim laporan secara langsung lengkap dengan lokasi dan bukti foto.

## 🎯 Tujuan Sistem

* Mempermudah masyarakat dalam melaporkan lampu jalan yang mati.
* Membantu petugas atau admin dalam memonitor laporan yang masuk.
* Menyediakan informasi status penanganan laporan secara transparan.
* Mendukung proses perbaikan lampu jalan agar lebih cepat dan efektif.

---

## ✨ Fitur Utama

### 👥 Masyarakat

* Pelaporan lampu jalan mati
* Deteksi lokasi otomatis menggunakan GPS
* Upload foto kondisi lampu
* Tracking status laporan
* Tracking progres teknisi

### 👨‍💼 Admin

* Login admin
* Dashboard monitoring laporan
* Data laporan masyarakat
* Detail laporan dan lokasi
* Update status laporan
* Grafik statistik pelaporan
* Hapus laporan

---

## 🛠️ Teknologi yang Digunakan

### Frontend

* HTML5
* CSS3
* Bootstrap 5
* Bootstrap Icons
* JavaScript

### Backend

* PHP Native

### Database

* MySQL

### Library Tambahan

* Chart.js
* Leaflet Maps
* SweetAlert2

---

## 📂 Struktur Folder

```text
smart-pju/
│
├── index.php
├── login.php
├── logout.php
│
├── assets/
│   ├── css/
│   ├── img/
│   └── upload/
│       └── laporan/
│
├── includes/
│   └── koneksi.php
│
├── pelapor/
│   ├── tambah_laporan.php
│   └── tracking.php
│
├── admin/
│   ├── dashboard.php
│   ├── laporan.php
│   ├── detail.php
│   ├── update_status.php
│   ├── grafik.php
│   └── hapus.php
│
└── database/
    └── smart_pju.sql
```

---

## 🔄 Alur Sistem

1. Masyarakat membuka website Smart PJU.
2. Mengisi formulir laporan.
3. Sistem mengambil lokasi GPS secara otomatis.
4. Pengguna mengunggah foto lampu yang rusak.
5. Laporan tersimpan ke database.
6. Admin menerima dan memproses laporan.
7. Status laporan diperbarui.
8. Masyarakat dapat melihat perkembangan penanganan melalui fitur tracking.

---

## 📊 Status Laporan

* Baru
* Diproses
* Selesai

Status tersebut digunakan untuk menampilkan progres penanganan dan tracking teknisi.

---

## 🚀 Cara Menjalankan

1. Salin project ke folder:

```text
xampp/htdocs/
```

2. Jalankan Apache dan MySQL melalui XAMPP.

3. Import database:

```text
database/smart_pju.sql
```

4. Atur koneksi database pada file:

```text
includes/koneksi.php
```

5. Buka browser:

```text
http://localhost/smart-pju
```

---

## 📸 Tampilan Sistem

* Landing Page Smart PJU
* Form Pelaporan Lampu Jalan
* Tracking Laporan dan Teknisi
* Dashboard Admin
* Data Laporan
* Grafik Statistik Pelaporan

---

## 👨‍💻 Pengembang

Proyek ini dibuat sebagai tugas pengembangan aplikasi berbasis web dengan tema Smart City dan Pelayanan Masyarakat.

---

© 2026 Smart PJU - Sistem Pelaporan Lampu Jalan Mati
