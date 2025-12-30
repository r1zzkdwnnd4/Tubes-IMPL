# [Travela - Web Pemesanan Wisata]

## Deskripsi
Travela adalah aplikasi web berbasis Laravel yang digunakan untuk melakukan
pemesanan tiket wisata secara online. Aplikasi ini memiliki fitur booking,
manajemen destinasi wisata, dan riwayat transaksi.

---

## Fitur Aplikasi

Aplikasi ini memiliki tiga aktor utama, yaitu **Customer**, **Agen**, dan **Admin**.  
Setiap aktor memiliki hak akses dan fitur yang berbeda sesuai dengan perannya.

### 1. Customer
Customer merupakan pengguna yang melakukan pemesanan wisata. Fitur yang tersedia untuk customer antara lain:

- Registrasi akun
- Login ke sistem
- Reset password
- Melihat halaman Home
- Melihat daftar wisata dalam katalog
- Melakukan pemesanan wisata
- Melihat riwayat pemesanan (history)
- Melihat status pemesanan:
  - Pending
  - Dikonfirmasi
  - Ditolak

---

### 2. Agen
Agen bertugas menangani pemesanan wisata berdasarkan area tertentu (kota).  
Setiap agen hanya dapat mengelola wisata yang berada dalam area penugasannya.

Fitur yang tersedia untuk agen:

- Login ke sistem
- Melihat daftar pemesanan dari customer sesuai area agen
- Mengelola pemesanan wisata pada area yang ditugaskan
- Mengubah status pemesanan customer menjadi:
  - Dikonfirmasi
  - Ditolak

---

### 3. Admin
Admin bertugas mengelola data utama dalam sistem.

Fitur yang tersedia untuk admin:

- Login ke sistem
- Menambahkan data agen
- Mengelola dan mengedit data customer
- Menambahkan data wisata

---

### 4. Admin Manager
Admin Manager memiliki hak akses untuk melihat laporan transaksi dalam sistem.

Fitur yang tersedia untuk admin manager:

- Login ke sistem
- Melihat laporan transaksi pemesanan wisata

---

## Teknologi yang Digunakan
- Laravel
- PHP
- MySQL
- HTML, CSS, JavaScript
- Bootstrap / Tailwind CSS

---

## Panduan Instalasi

1. Clone repository
```bash
git clone https://github.com/username/nama-repository.git


