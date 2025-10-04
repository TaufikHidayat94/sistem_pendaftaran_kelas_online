# 📘 API Specification — Sistem Pendaftaran Kelas

Dokumentasi endpoint utama pada aplikasi pendaftaran kelas berbasis Yii2.

---

## AUTH & USER MANAGEMENT

### `POST /user/register`
**Deskripsi:** Mendaftarkan user baru sebagai siswa.

**Parameter:**
| Nama     | Jenis    |   Keterangan   |
|----------|----------|----------------|
| username | string   | Username unik  |
| email    | string   | Email aktif    |
| password | string   | Password login |

**Response:**
- Success: User baru terdaftar dan diarahkan ke halaman login.
- Error: Validasi gagal.

---

### `GET /user/index`
**Deskripsi:** Menampilkan daftar user (khusus admin).

**Role:** Admin  
**Output:** Tabel data user (username, email, role).

---

## SISWA

### `GET /siswa/index-kelas`
Menampilkan daftar kelas tersedia lengkap dengan kuota & pengajar.

### `POST /siswa/daftar?id_kelas={id}`
Mendaftarkan diri ke kelas.

**Response:**
- `success`: “Pendaftaran berhasil.”
- `error`: “Kuota penuh” atau “Anda sudah terdaftar.”

### `GET /siswa/kelas-saya`
Menampilkan kelas yang sudah diikuti siswa (status pending, approved, rejected, batal).

### `POST /siswa/batalkan?id_trx={id}`
Membatalkan pendaftaran (status menjadi *batal*).

---

## ADMIN

### `GET /kelas/index`
Menampilkan daftar kelas yang dikelola admin.

### `POST /kelas/create`
Menambahkan kelas baru.

### `POST /kelas/update?id_kelas={id}`
Mengedit kelas.

### `POST /kelas/delete?id_kelas={id}`
Menghapus kelas.

---

## DASHBOARD ANALITIK

### `GET /site/dashboard`
Menampilkan grafik:
- Kuota vs Pendaftar per Kelas
- Pendaftar per Hari (line chart)

**Parameter:**
- `id_ta`: Filter tahun ajaran

---

## NOTIFIKASI

### Email Otomatis
Sistem mengirim email konfirmasi ke siswa saat berhasil daftar kelas.

