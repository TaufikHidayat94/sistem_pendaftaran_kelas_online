**ENTITY RELATIONSHIP DIAGRAM**
SISTEM PENDAFTARAN KELAS ONLINE


┌───────────────┐        1 ──── 1        ┌────────────────┐
│   user        │────────────────────────│    siswa       │
│───────────────│                        │────────────────│
│ id_user PK    │                        │ id_siswa PK    │
│ username      |                        | id_user  FK    |
| password_hash │                        │ nama_siswa     │
│ auth_key      |                        | alamat         |
| access_token  |                        | tempat_lahir   |
| email         │                        │ tanggal_lahir  │
│ role          │                        │ tanggal_daftar |
└───────────────┘                        │ username       │
        |                                | email          |
        |                                | foto           |
        |                                | kontak         |
        |  1 ──── *                      └────────────────┘
        │
        │ 
        ▼
┌──────────────┐        * ──── 1         ┌───────────────┐
│  order_kelas │─────────────────────────│    kelas      │
│──────────────│                         │───────────────│
│ id_trx  PK   │                         │ id_kelas PK   │
│ id_siswa FK  │                         │ nama_kelas    │
│ id_kelas FK  │                         │ id_pengajar FK│
│ status       |                         │ kapasitas     │
| waktu_order  │                         │ id_ta FK      │
│ tanggal_order│                         │ terdaftar     │
│ approval_date│                         └───────────────┘
└──────────────┘                         

     │
     │  * ──── 1
     ▼
┌───────────────────┐        * ──── 1       ┌───────────────┐
│  pengajar         │───────────────────────│  pendidikan   │
│───────────────────│                       │───────────────│
│ id_pengajar PK    │                       │ id_pengajar PK│
│ nama_pengajar     │                       │ pendidikan    │
│ pendidikan        |                       └───────────────┘
| tanggal_terdaftar |
| kontak            |
| username          |
| email             │                       
└───────────────────┘

     │
     │  * ──── 1
     ▼
┌──────────────┐
│ tahun_ajaran │
│──────────────│
│ id_ta PK     │
│ tahun        │
│ periode      │
└──────────────┘
