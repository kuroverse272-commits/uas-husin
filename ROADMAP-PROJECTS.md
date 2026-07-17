# 🏨 Hotel Starking - Roadmap Project

## 📌 Informasi Project

- **Nama Project** : Hotel Starking
- **Framework** : Laravel 12
- **Bahasa** : PHP 8+
- **Database** : MySQL
- **Frontend** : HTML, CSS, Bootstrap 5, JavaScript
- **Template Engine** : Blade
- **Server** : Laravel Herd / XAMPP
- **Version Control** : Git

---

# 🎯 Tujuan Project

Membangun website booking hotel yang modern, responsif, dan mudah digunakan oleh pelanggan untuk melakukan reservasi kamar secara online serta menyediakan dashboard admin untuk mengelola seluruh data.

---

# 🗂️ Struktur Fitur

## Frontend

- Beranda
- Daftar Kamar
- Detail Kamar
- Booking Online
- Fasilitas
- Galeri
- Tentang Kami
- Kontak

## Backend (Admin)

- Login Admin
- Dashboard
- CRUD Kamar
- CRUD Booking
- CRUD Fasilitas
- CRUD Galeri
- Kelola Testimoni
- Laporan Booking

---

# 🚀 Roadmap Pengembangan

## ✅ Tahap 1 - Setup Project

### Target

- [x] Install Laravel
- [x] Install Composer
- [x] Install NodeJS
- [x] Konfigurasi MySQL
- [x] Testing Project
- [x] Git Repository

Output:

Project Laravel berhasil dijalankan.

---

## 🔵 Tahap 2 - Landing Page

### Target

- [ ] Navbar
- [ ] Hero Banner
- [ ] Form Pencarian Kamar
- [ ] Kamar Populer
- [ ] Fasilitas
- [ ] Testimoni
- [ ] Footer

Output:

Website memiliki tampilan profesional.

---

## 🟢 Tahap 3 - Database

### Target

Membuat tabel:

- [ ] users
- [ ] rooms
- [ ] bookings
- [ ] facilities
- [ ] galleries
- [ ] testimonials

Output:

Database siap digunakan.

---

## 🟡 Tahap 4 - CRUD Data Kamar

### Admin dapat

- [ ] Tambah kamar
- [ ] Edit kamar
- [ ] Hapus kamar
- [ ] Upload foto kamar

Output:

Data kamar tersimpan di database.

---

## 🟠 Tahap 5 - Booking Hotel

### Pelanggan dapat

- [ ] Melihat detail kamar
- [ ] Booking kamar
- [ ] Mengisi data diri
- [ ] Memilih tanggal check-in
- [ ] Memilih tanggal check-out

Output:

Data booking tersimpan.

---

## 🔴 Tahap 6 - Dashboard Admin

### Dashboard

- [ ] Total kamar
- [ ] Total booking
- [ ] Booking hari ini
- [ ] Pendapatan

Output:

Dashboard informatif.

---

## 🟣 Tahap 7 - Kelola Booking

Admin dapat

- [ ] Melihat booking
- [ ] Mengubah status
- [ ] Membatalkan booking
- [ ] Menghapus booking

Status Booking

- Pending
- Confirmed
- Check In
- Check Out
- Cancelled

---

## 🟤 Tahap 8 - Login Admin

Fitur

- [ ] Login
- [ ] Logout
- [ ] Middleware
- [ ] Session

Output:

Halaman admin aman.

---

## 🔵 Tahap 9 - Fasilitas

CRUD

- [ ] Tambah fasilitas
- [ ] Edit
- [ ] Hapus

---

## 🟢 Tahap 10 - Galeri

CRUD

- [ ] Upload gambar
- [ ] Edit
- [ ] Hapus

---

## 🟡 Tahap 11 - Testimoni

CRUD

- [ ] Tambah testimoni
- [ ] Edit
- [ ] Hapus

---

## 🟠 Tahap 12 - Pencarian

Fitur

- [ ] Cari kamar
- [ ] Filter harga
- [ ] Filter kapasitas

---

## 🔴 Tahap 13 - Validasi

- [ ] Validasi Form
- [ ] Error Message
- [ ] Success Message

---

## 🟣 Tahap 14 - Responsive

- [ ] Mobile
- [ ] Tablet
- [ ] Desktop

---

## 🟤 Tahap 15 - Optimasi

- [ ] Upload gambar
- [ ] Pagination
- [ ] Loading
- [ ] Cache

---

## ⚫ Tahap 16 - Deployment

- [ ] Hosting
- [ ] Domain
- [ ] SSL
- [ ] Database Online

Output:

Website dapat diakses publik.

---

# 📁 Struktur Folder

```
resources/
│
├── views/
│   ├── layouts/
│   ├── home.blade.php
│   ├── kamar/
│   ├── booking/
│   ├── fasilitas/
│   ├── galeri/
│   ├── tentang/
│   ├── kontak/
│   └── admin/
│
public/
│
├── images/
├── uploads/
└── css/
```

---

# 🗄️ Struktur Database

## rooms

- id
- name
- type
- description
- price
- capacity
- image
- status

---

## bookings

- id
- room_id
- customer_name
- email
- phone
- check_in
- check_out
- guest
- total_price
- status

---

## facilities

- id
- name
- icon
- description

---

## galleries

- id
- image
- title

---

## testimonials

- id
- name
- job
- message
- photo

---

# 🎨 Warna Website

| Elemen | Warna |
|---------|--------|
| Primary | #0F4C81 |
| Secondary | #D4AF37 |
| Background | #F8F9FA |
| Text | #212529 |
| White | #FFFFFF |

---

# 📌 Target Akhir

Website memiliki fitur:

- ✅ Landing Page Modern
- ✅ Booking Hotel Online
- ✅ Dashboard Admin
- ✅ CRUD Lengkap
- ✅ Upload Gambar
- ✅ Responsive
- ✅ Siap Hosting
- ✅ Siap Domain

---

# 📅 Progress

| Tahap | Status |
|--------|--------|
| Setup Project | ✅ Selesai |
| Landing Page | ⏳ Proses |
| Database | ⏳ Belum |
| CRUD Kamar | ⏳ Belum |
| Booking | ⏳ Belum |
| Dashboard Admin | ⏳ Belum |
| Login | ⏳ Belum |
| Deployment | ⏳ Belum |

---

**Hotel Starking** merupakan proyek UAS berbasis Laravel yang bertujuan membangun sistem reservasi hotel modern dengan antarmuka yang menarik, fitur pemesanan online, dan dashboard admin untuk pengelolaan data secara efisien.