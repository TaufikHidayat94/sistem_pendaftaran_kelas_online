<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pengajar".
 *
 * @property string $id_pengajar
 * @property string $nama_pengajar
 * @property string $pendidikan
 * @property string $tanggal_terdaftar
 * @property string $kontak
 * @property string $username
 * @property string $email
 */
class Pengajar extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pengajar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_pengajar', 'pendidikan', 'tanggal_terdaftar', 'kontak', 'username', 'email'], 'required',
            'message' => 'Kolom {attribute} Tidak Boleh Kosong!'],
            [['tanggal_terdaftar'], 'safe'],
            [['id_pengajar'], 'string', 'max' => 10],
            [['nama_pengajar', 'pendidikan', 'username'], 'string', 'max' => 100],
            [['kontak'], 'string', 'max' => 15],
            [['email'], 'string', 'max' => 200],
            [['id_pengajar'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pengajar' => 'Id Pengajar',
            'nama_pengajar' => 'Nama Pengajar',
            'pendidikan' => 'Pendidikan',
            'tanggal_terdaftar' => 'Tanggal Terdaftar',
            'kontak' => 'Kontak',
            'username' => 'Username',
            'email' => 'Email',
        ];
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            // Cari id_pengajar terakhir
            $lastId = self::find()
                ->select('id_pengajar')
                ->orderBy(['CAST(SUBSTRING(id_pengajar, 6) AS UNSIGNED)' => SORT_DESC])
                ->scalar();

            if ($lastId === null) {
                $newNumber = 1;
            } else {
                $lastNumber = (int) substr($lastId, 3); // ambil angka dari PG-XXXXXX
                $newNumber = $lastNumber + 1;
            }

            // Format jadi PG-XXXX
            $this->id_pengajar = 'PG-' . str_pad($newNumber, 6, '0', STR_PAD_LEFT);
        }

        return parent::beforeSave($insert);
    }
    public function getPendidikanNama()
        {
            return $this->hasOne(Pendidikan::class, ['id_pendidikan' => 'pendidikan']);
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

}
