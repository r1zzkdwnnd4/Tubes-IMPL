# 🌍 Travela — Web Pemesanan Wisata

Travela adalah aplikasi web berbasis **Laravel** yang digunakan untuk melakukan
pemesanan tiket wisata secara online. Aplikasi ini dirancang untuk memudahkan
customer dalam memesan wisata, agen dalam mengelola pemesanan berdasarkan area,
serta admin dalam mengelola data dan laporan transaksi.

---

## ✨ Fitur Aplikasi

Aplikasi ini memiliki tiga aktor utama, yaitu **Customer**, **Agen**, dan **Admin**.
Setiap aktor memiliki hak akses dan fitur yang berbeda sesuai dengan perannya.

### 👤 Customer
Customer merupakan pengguna yang melakukan pemesanan wisata.

Fitur yang tersedia:
- Registrasi akun
- Login ke sistem
- Reset password
- Mengakses halaman Home
- Melihat daftar wisata pada katalog
- Melakukan pemesanan wisata
- Melihat riwayat pemesanan (history)
- Melihat status pemesanan:
  - 🟡 Pending
  - 🟢 Dikonfirmasi
  - 🔴 Ditolak

---

### 🧭 Agen
Agen bertugas menangani pemesanan wisata berdasarkan **area (kota)** tertentu.
Setiap agen hanya dapat mengelola wisata yang berada dalam area penugasannya.

Fitur yang tersedia:
- Login ke sistem
- Melihat daftar pemesanan customer sesuai area agen
- Mengelola pemesanan wisata
- Mengubah status pemesanan menjadi:
  - 🟢 Dikonfirmasi
  - 🔴 Ditolak

---

### 🛠️ Admin
Admin bertugas mengelola data utama dalam sistem.

Fitur yang tersedia:
- Login ke sistem
- Menambahkan dan mengelola data agen
- Mengelola dan mengedit data customer
- Menambahkan data wisata

---

### 📊 Admin Manager
Admin Manager memiliki akses khusus untuk memantau aktivitas transaksi.

Fitur yang tersedia:
- Login ke sistem
- Melihat laporan transaksi pemesanan wisata

---

## 🧰 Teknologi yang Digunakan
- Laravel
- PHP
- MySQL
- HTML, CSS, JavaScript
- Bootstrap / Tailwind CSS

---

## 💻 Panduan Instalasi

1. Clone repository
```bash
git clone https://github.com/username/nama-repository.git
```
---

2. Masuk ke Folder Proyek
  ```bash
  cd nama-repository
```
---
   
4. install dependency laravel
  ```bash
composer install
```
---
   
6. copy file environtment
  ```bash
cp .env.example .env
```
---
   
8. generate application key
```bash
php artisan key:generate
```
---

10. konfigurasi database di file env
```bash
 DB_DATABASE=nama_database
 DB_USERNAME=root
 DB_PASSWORD=
```
---

11. jalankan migration
```bash
php artisan migrate

```
---

13. jalankan seeder (opsional)
```bash
php artisan db:seed
```
---

14. jalankan server
```bash
php artisan serve
```
---
    
16. jalankan di web browser
```bash
travela.test
```
---
   


