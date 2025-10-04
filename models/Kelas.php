<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "kelas".
 *
 * @property string $id_kelas
 * @property string $nama_kelas
 * @property string $id_kelas
 * @property int $kapasitas
 * @property string $id_ta
 * @property int $terdaftar
 */
class Kelas extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kelas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_kelas', 'id_pengajar', 'kapasitas', 'id_ta', 'terdaftar'], 'required',
                'message' => 'Kolom {attribute} Tidak Boleh Kosong!'],
            [['kapasitas', 'terdaftar'], 'integer'],
            [['id_kelas', 'id_ta', 'id_pengajar'], 'string', 'max' => 10],
            [['nama_kelas'], 'string', 'max' => 50],
            [['id_kelas'], 'string', 'max' => 10],
            [['id_kelas'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kelas' => 'Kode Kelas',
            'nama_kelas' => 'Nama Kelas',
            'id_kelas' => 'Nama Pengajar',
            'kapasitas' => 'Kuota',
            'id_ta' => 'Tahun Ajaran',
            'terdaftar' => 'Jumlah Terdaftar',
        ];
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            // Cari id_kelas terakhir
            $lastId = self::find()
                ->select('id_kelas')
                ->orderBy(['CAST(SUBSTRING(id_kelas, 4) AS UNSIGNED)' => SORT_DESC])
                ->scalar();

            if ($lastId === null) {
                $newNumber = 1;
            } else {
                $lastNumber = (int) substr($lastId, 3); // ambil angka dari KL-XXXX
                $newNumber = $lastNumber + 1;
            }

            // Format jadi KL-XXXX
            $this->id_kelas = 'KL-' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
        }

        return parent::beforeSave($insert);
    }

    public function getPengajarNama()
        {
            return $this->hasOne(Pengajar::class, ['id_pengajar' => 'id_pengajar']);
        }
    
        // Relasi ke Tahun Ajaran
    public function getTahunAjaran()
    {
        return $this->hasOne(TahunAjaran::class, ['id_ta' => 'id_ta']);
    }


    // relasi antar tabel -> models/Kelas.php
    public function getPengajar()
    {
        return $this->hasOne(Pengajar::class, ['id_pengajar' => 'id_pengajar']);
    }

    public function getOrders()
    {
        return $this->hasMany(OrderKelas::class, ['id_kelas' => 'id_kelas'])
            ->andWhere(['status' => ['approved', 'pending']]) // hanya ini yang dihitung
            ->count();
    }

    public function getTahunAjaranLabel()
    {
        return $this->tahunAjaran 
            ? $this->tahunAjaran->tahun . ' - ' . $this->tahunAjaran->periode 
            : null;
    }
    public function getSisaKuota()
    {
        return $this->kapasitas - $this->terdaftar;
    }





}
