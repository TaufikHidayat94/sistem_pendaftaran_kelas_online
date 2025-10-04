<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "siswa".
 *
 * @property string $id_siswa
 * @property string $nama_siswa
 * @property string $alamat
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $tanggal_daftar
 * @property string $username
 * @property string $email
 * @property string $foto
 * @property string $kontak
 */
class Siswa extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'siswa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_siswa', 'alamat', 'tempat_lahir', 'tanggal_lahir', 'tanggal_daftar', 'username', 'email'], 'required',
            'message' => 'Kolom {attribute} Tidak Boleh Kosong!'],
            [['tanggal_lahir', 'tanggal_daftar'], 'safe'],
            [['id_siswa'], 'string', 'max' => 10],
            [['nama_siswa', 'alamat', 'username'], 'string', 'max' => 100],
            [['tempat_lahir'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 150],
            [['kontak'], 'string', 'max' => 15],
            [['username'], 'unique'],
            [['id_siswa'], 'unique'],
            [['foto'], 'file', 'extensions' => 'png, jpg, jpeg', 'skipOnEmpty' => true, 'maxSize' => 2*1024*1024], // max 2MB

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_siswa' => 'Kode Siswa',
            'nama_siswa' => 'Nama Siswa',
            'alamat' => 'Alamat',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'tanggal_daftar' => 'Tanggal Daftar',
            'username' => 'Username',
            'email' => 'Email Terdaftar',
            'kontak' => 'Kontak',
        ];
    }

        public function beforeSave($insert)
    {
        if ($insert) {
            // Cari id_siswa terakhir
            $lastId = self::find()
                ->select('id_siswa')
                ->orderBy(['CAST(SUBSTRING(id_siswa, 6) AS UNSIGNED)' => SORT_DESC])
                ->scalar();

            if ($lastId === null) {
                $newNumber = 1;
            } else {
                $lastNumber = (int) substr($lastId, 3); // ambil angka dari SI-XXXXXX
                $newNumber = $lastNumber + 1;
            }

            // Format jadi SI-XXXX
            $this->id_siswa = 'SI-' . str_pad($newNumber, 6, '0', STR_PAD_LEFT);
        }

        return parent::beforeSave($insert);
    }

    // relasi antar tabel 
        public function getPengajar()
        {
            return $this->hasOne(Pengajar::class, ['id_pengajar' => 'id_pengajar']);
        }

        public function getOrders()
        {
            return $this->hasMany(OrderKelas::class, ['id_kelas' => 'id_kelas']);
        }

        public function getSisaKuota()
        {
            return $this->kapasitas - $this->terdaftar;
        }
        public function getUser()
        {
            return $this->hasOne(User::class, ['id_user' => 'id_user']);
        }


}
