# Arsitektur Sistem — Sistem Pendaftaran Kelas Online

## 1. Overview
Aplikasi ini dibangun dengan metode *Model-View-Controller (MVC)* menggunakan **Yii2 Framework (PHP)**.  
Sistem mendukung dua role utama:
- **Admin:** mengelola data kelas, kuota, siswa, user dan persetujuan pendaftaran.
- **Siswa:** melakukan pendaftaran kelas, melihat kuota real-time, dan mengatur profil.

---

## 2. Arsitektur Lapisan (Layered Architecture)
    ┌────────────────────────────────────┐
    │ Presentation Layer │
    │────────────────────────────────────│
    │ View (HTML, Bootstrap, AdminLTE) │
    │ Controller (Site, Siswa, Kelas, │
    │ User, OrderKelas) │
    └────────────────────────────────────┘
    │
    ▼
    ┌────────────────────────────────────┐
    │ Application Layer │
    │────────────────────────────────────│
    │ Business Logic di dalam Controller │
    │ Validasi Input │
    │ Session, FlashMessage, Auth │
    └────────────────────────────────────┘
    │
    ▼
    ┌────────────────────────────────────┐
    │ Data Layer │
    │────────────────────────────────────│
    │ Model (ActiveRecord): │
    │ User, Siswa, Kelas, OrderKelas, │
    │ TahunAjaran, Pengajar │
    │ Database: MySQL/MariaDB │
    └────────────────────────────────────┘
    │
    ▼
    ┌────────────────────────────────────┐
    │ Infrastructure Layer │
    │────────────────────────────────────│
    │ Yii2 Framework Core, PHP 8.x, │
    │ Composer, Mailer (SMTP/SSL), │
    │ XAMPP stack │
    └────────────────────────────────────┘
---

## 3. Komponen Utama

| Komponen           | Deskripsi                                        |
|--------------------|--------------------------------------------------|
| **Controllers**    | Mengatur logika alur data antara model dan view. |
| **Models**         | Representasi tabel dalam database (ORM).         |
| **Views**          | Menampilkan UI menggunakan Bootstrap + AdminLTE. |
| **Mailer**         | Mengirim notifikasi email otomatis.              |
| **Session & Auth** | Mengatur login, role, dan izin akses.            |

---

## 4. Alur Proses Utama

### 4.1. Alur Pendaftaran Kelas
    [Siswa Login]
    ↓
    [Melihat Daftar Kelas (index-kelas)]
    ↓
    [Mendaftar → Status Approve]
    ↓
    [Admin Dapat Melakukan Approve/Reject]
    ↓
    [Email Konfirmasi Dikirim]
    ↓
    [Sisa Kuota Berkurang Otomatis]

### 4.2. Alur Pengelolaan oleh Admin
    [Admin Login]
    ↓
    [Mengelola Data Kelas, Kuota, Siswa, Pengajar, Tahun Ajaran, User]
    ↓
    [Melihat Daftar Pendaftar Kelas]
    ↓
    [Approve / Reject / Pending / Batalkan]
    ↓
    [Dashboard Statistik & Kuota]

---

## 5. Integrasi Komponen

| Komponen             | Terhubung ke                 | Fungsi                                       |
|----------------------|------------------------------|----------------------------------------------|
| UserController       | Model User, View Register    | Mengatur registrasi & autentikasi            |
| SiswaController      | OrderKelas, Kelas            | Pendaftaran dan manajemen kelas siswa        |
| KelasController      | Kelas, OrderKelas, Pengajar  | CRUD data kelas & kuota                      |
| OrderKelasController | Kelas, Siswa                 | Proses approval, pembatalan                  |
| Mailer               | Semua controller pendaftaran | Notifikasi email otomatis                    |
| SiteController       | Semua model                  | Menampilkan seluruh view, termasuk dashboard |

---

## 6. Infrastruktur Teknis

| Komponen           | Teknologi                        |
|--------------------|----------------------------------|
| Bahasa Pemrograman | PHP 8.x                          |
| Framework          | Yii2 (Advanced Template)         |
| Database           | MySQL / MariaDB                  |
| Frontend           | AdminLTE + Bootstrap 4           |
| Mail Service       | SMTP Gmail dengan SSL            |
| Server Lokal       | XAMPP / Apache                   |
| Deployment         | GitHub / Vercel / VPS lokal      |
| Testing            | Codeception (Unit & Functional)  |

---

## 7. Keamanan
- Password dienkripsi dengan `Yii::$app->security->generatePasswordHash()`.
- Validasi input server-side dan CSRF token aktif.
- Role-based Access Control sederhana (admin/siswa).
- SSL diaktifkan untuk pengiriman email (SMTP Gmail).
- Foreign Key constraint untuk integritas data antar tabel.

---

## 8. Diagram Sederhana Komunikasi
+-----------+      +--------------+      +--------------+
| Browser   | <--> | Yii2 App     | <--> | MySQL Server |
| (View/UI) |      | (Controller) |      | (Models)     |
+-----------+      +--------------+      +--------------+
    │                      |                     |
    ▼                      ▼                     ▼
  HTML /       JS UI Business Logic CRUD /     Relasi
  
---

## 9. Catatan
- Semua modul CRUD siswa, kelas, dan user telah terintegrasi.
- Email otomatis aktif saat pendaftaran kelas.
- Role siswa otomatis terbentuk saat registrasi.
- Kuota real-time dihitung langsung berdasarkan data `OrderKelas` lalu diperhitungkan
  dengan jumlah `kelas.kapasitas`, sehingga hasilnya akan diupdate di `kelas.terdaftar`

---

