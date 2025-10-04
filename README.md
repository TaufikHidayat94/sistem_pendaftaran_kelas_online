# 📚 Sistem Pendaftaran Kelas dengan Kuota Real-time

Aplikasi berbasis web menggunakan **Yii2 Framework** yang memungkinkan siswa mendaftar kelas dengan kuota real-time, serta admin dapat mengelola kelas, kuota, dan peserta.

---

## ✨ Fitur Utama

### 👨‍🎓 Siswa
- Melakukan registrasi menjadi user dengan role Siswa.
- Melihat daftar kelas yang tersedia.
- Melihat kuota dan sisa kuota secara real-time.
- Mendaftar kelas, status auto approve, tapi bisa melakukan aksi ketika statusnya pending, rejected, batal (status dapat diatur oleh admin).
- Melihat riwayat pendaftaran kelas saya.
- Mengedit profil (nama, email, kontak, foto profil).
- Menerima notifikasi otomatis (SweetAlert) dan email konfirmasi.

### 👨‍💼 Admin
- CRUD User (role admin/siswa).
- CRUD Kelas, Tahun Ajaran, Pengajar.
- Manajemen kuota & approval pendaftaran.
- Melihat daftar peserta tiap kelas.
- Dashboard analitik (grafik kuota vs pendaftar, grafik pendaftar per hari).

---

## 🏗️ Arsitektur Aplikasi

- **Framework**: Yii2 (PHP 8.1+)
- **Database**: MySQL / MariaDB
- **Frontend**: AdminLTE3, Bootstrap, Chart.js, SweetAlert2
- **Library tambahan**:
  - `dominus77/yii2-sweetalert2-widget`
  - `hail812/yii2-adminlte3`
  - `yiisoft/yii2-symfonymailer`
- **Spesifikasi Minimum**
    - PHP >= 8.1
    - MySQL / MariaDB
    - Composer
    - XAMPP
    - Browser modern (Chrome / Edge)
    - Git (opsional, untuk clone repository)

- **Struktur Direktori**

      assets/             contains assets definition
      commands/           berisi console commands (untuk controllers)
      config/             berisi konfigurasi aplikasi
      controllers/        berisi Class untuk Web controller
      database/           berisi file dump SQL database untuk diimpor
      mail/               berisi file view untuk email
      models/             berisi class untuk models
      runtime/            berisi file-file yang dihasilkan selama proses runtime
      tests/              berisi berbagai pengujian dasar untuk aplikasi
      vagrant/            berisi tools pengembangan lokal menggunakan vagrant (VM) berbasis skrip otomatisasi.
      vendor/             berisi paket aplikasi dari pihak ketiga yang saling bergantung (dependencies)
      views/              berisi file view untuk aplikasi web 
      web/                berisi skrip kode untuk aplikasi web
      widgets/            berisi komponen tampilan kustom (reusable UI components) yang dibuat sendiri.


### Alur Model -> View -> Controller
- User (Siswa/Admin) login → Controller → Model → Database → View.
- Relasi data dikelola melalui ActiveRecord Yii2.

---

### 🗄️ ERD (Entity Relationship Diagram)
- user (1) — (1) siswa
- kelas (1) — (N) order_kelas
- siswa (1) — (N) order_kelas
- tahun_ajaran (1) — (N) kelas
- pengajar (1) — (N) kelas
- pendidikan (1) - (N) pengajar


---

### ⚙️ Instalasi

1. Clone repo:

   ```bash
   git clone https://github.com/username/kelas-app.git
   cd kelas-app

2. Install dependencies:

    composer install

3. setup database config/db.php

    'dsn' => 'mysql:host=127.0.0.1;dbname=kelas',
    'username' => 'root',
    'password' => '',

4. Jalankan migrasi database:
    
    php yii migrate

5. Jalankan server:

    php yii serve --port=8080

6. Akses via browser:
    http://localhost:8080

---

### 🔑 Akun Dummy

- Admin
    - Username: admin
    - Password: admin

- Demo
    - Username: demo
    - Password: demo

---

### 📊 Dashboard Analitik

- Grafik 1: Kuota vs Pendaftar Per kelas
- Grafik 2: Jumlah pendaftar per hari

Grafik menggunakan Chart.js dan data diambil real-time dari tabel kelas dan order_kelas.

---

### Notifikasi Email

- Menggunakan library Symfony Mailer.
- Mendukung Gmail (App Password), Outlook, atau Zoho Mail. Project ini menggunakan Gmail.
- Email konfirmasi otomatis saat siswa berhasil daftar kelas.

---

### 🚀 Deployment

1. Pastikan hosting/VPS mendukung PHP 8+ dan MySQL.
2. Upload semua file project.
3. Import database dari /database/kelas.sql.
4. Atur config/db.php sesuai server.
5. Pastikan folder runtime/ dan web/assets/ writable (chmod 777).
6. Tambahkan .htaccess untuk URL friendly:
    RewriteEngine on
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule . index.php

---

### 🧪 Testing

- Unit Test menggunakan codeception
    vendor\bin\codecept run

- Skenario:
    - Validasi password hash
        vendor\bin\codecept run tests\unit\UserTest.php

    - Login siswa/admin
        vendor\bin\codecept run tests\unit\loginTest.php

    - Melihat daftar kelas dan kuota
        vendor\bin\codecept run tests\unit\KelasTest.php

    - Mendaftar kelas & validasi kuota
        vendor\bin\codecept run tests\unit\PendaftaranTest.php

    - Admin menyetujui / menolak pendaftaran
        vendor\bin\codecept run tests\unit\KonfirmasiTest.php

    - CRUD kelas & user dengan role Admin untuk menambah kelas
        vendor\bin\codecept run tests\unit\AdminTest.php

---

### 📹 Demo

- Video Demo aplikasi: [Youtube Link](https://youtu.be/dPKsLZ6yxTg)
- Deploy Online: https://bikinpinter.xyz/
    - Akun dummy untuk demo online:
        - Role Admin
            - Username: admin
            - Password: admin

        - Role Siswa
            - Username: demo
            - Password: demo

---