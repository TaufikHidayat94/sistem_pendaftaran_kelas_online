**🧭 Panduan Deployment Sistem Pendaftaran Kelas**

1. Persiapan Lingkungan

    **Spesifikasi Minimum**
        - PHP >= 8.0
        - MySQL / MariaDB
        - Composer
        - XAMPP
        - Browser modern (Chrome / Edge)
        - Git (opsional, untuk clone repository)
---

2. Instalasi Project

    - Langkah 1 - Clone atau ekstract project
        Jika via Git:
            git clone https://github.com/TaufikHidayat94/sistem_pendaftaran_kelas_online
            cd kelas

        Jika manual, ekstrak folder project ke direktori project (kelas), contoh:
            D:\xampp\htdocs\kelas

    - Langkah 2 - Instal Dependency
        Jalankan di terminal/command line:
            composer install
        Pastikan tidak ada error memory limit atau missing extension.
---

3. Konfigurasi Database

    - Jalankan phpMyadmin dari XAMPP (Start services Apache dan MySQL)
    - Buat database baru:
        CREATE DATABASE kelas CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
    - Import file dump sql ke database:
        /database/kelas.sql
    - Buka file konfigurasi /config/db.php
      Sesuaikan koneksi dengan pengaturan web server anda:
      return [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=kelas',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ];
---

4. Konfigurasi Pengiriman Email (Notifikasi Otomatis)

    - Gunakan akun Gmail dengan App Password:
        - Aktifkan 2-Step Verification di akun Gmail.
        - Masuk ke Keamanan > Sandi Aplikasi.
        - Pilih "Aplikasi Lainnya" → beri nama misalnya YiiMailer.
        - Salin 16 digit sandi aplikasi.
    - Edit config/web.php
            'mailer' => [
            'class' => 'yii\symfonymailer\Mailer',
            'viewPath' => '@app/mail',
            'transport' => [
                'scheme' => 'smtps',
                'host' => 'smtp.gmail.com',
                'username' => 'emailanda@gmail.com', // alamat email anda
                'password' => 'app_password_16digit', // 16 digit app password
                'port' => 465,
                'encryption' => 'ssl',
            ],
            'useFileTransport' => false,
        ],
---

5. Jalankan Server Lokal

    - Buka terminal di root project, lalu jalankan
        php yii serve
      Akses dari http://localhost:8080/
    - Atau dapat menggunakan secara langsung jika apache dan mysql sudah berjalan
      pastikan project sudah ditaruh di folder /htdocs/kelas.
      Akses dari http://localhost/kelas/web
---

6. Akun Awal
    | Role  | Username | Password |
    | ----- | -------- | -------- |
    | Admin | admin    | admin123 |
    | Siswa | demo     | demo123  |
    Akun ini digunakan jika belum setting db (baru instalasi), jika sudah ada DB,
    gunakan username sama, tapi passwordnya admin dan demo.
---

7. Fitur dan Role
    - Role Admin
    -------------
        - CRUD data kelas, tahun ajaran, pengajar, siswa dan user
        - Menyetujui / menolak pendaftaran
        - Melihat grafik analitik dashboard

    - Role Siswa
    ------------
        - Melihat grafik analitik dashboard
        - Melihat daftar kelas dan sisa kuota
        - Mendaftar kelas (dengan status pending → approved otomatis)
        - Membatalkan atau mengajukan ulang
        - Mengedit profil dan mengunggah foto
---

8. Deployment ke Hosting / Demo Online
    - Gunakan hosting yang mendukung PHP ≥ 8.1 & Composer.
    - Upload semua file proyek ke folder public_html.
    - Ubah index.php di /web menjadi entry utama (root akses).
    - Pastikan file .htaccess aktif:
        RewriteEngine on
        RewriteBase /kelas/
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteRule . index.php [L]
    - Update koneksi database hosting di /config/db.php.
    - Pastikan ekstensi openssl aktif untuk pengiriman email.
---

9. Testing
    Untuk menjalankan test gunakan script ini di terminal:
     vendor/bin/codecept run
    Pastikan database yii2basic_test tersedia, impport dari /database/test.sql
    Untuk menjalankan test per unit secara logic dapat dilakukan dengan:
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

10. Troubleshooting Umum
    ________________________________________________________________________________________________________________
    | Masalah                    | Solusi                                                                          |
    | -------------------------- | ------------------------------------------------------------------------------- |
    | Error SSL saat kirim email | Nonaktifkan antivirus/allow port 465-587, pastikan `cacert.pem` di `php.ini` ok.|
    | Email gagal terkirim       | Cek `useFileTransport` di `web.php` (pastikan `false`)                          |
    | Not Found (404)            | Cek `urlManager` di config dan pastikan `.htaccess` aktif                       |
    | Error DB foreign key       | Pastikan `id_user` dan `id_siswa` sinkron                                       |
    |______________________________________________________________________________________________________________|

---

11. Kredit dan Kontributor
Dibuat oleh: Taufik Hidayat - Universitas Siber Asia
Sistem Pendaftaran Kelas Online