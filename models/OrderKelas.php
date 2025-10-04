<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "order_kelas".
 *
 * @property string $id_trx
 * @property string $id_siswa
 * @property string $id_kelas
 * @property string $status
 * @property string $waktu_order
 * @property string|null $tanggal_order
 * @property string|null $approval_date
 */
class OrderKelas extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_kelas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
            {
                return [
                    [['tanggal_order', 'approval_date'], 'default', 'value' => null],
                    [['id_siswa', 'id_kelas', 'status', 'waktu_order'], 'required'],
                    [['waktu_order', 'tanggal_order', 'approval_date'], 'safe'],
                    [['id_trx'], 'string', 'max' => 20],
                    [['id_siswa', 'id_kelas'], 'string', 'max' => 10],
                    [['status'], 'string', 'max' => 20],
                    [['id_trx'], 'unique'],
                ];
            }
                
    /*    {
        return [
            [['id_trx', 'id_siswa', 'id_kelas', 'status', 'waktu_order'], 'required'],
            [['tanggal_order', 'approval_date'], 'safe'],
        ];
        } */

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_trx' => 'Id Trx',
            'id_siswa' => 'Nama Siswa',
            'id_kelas' => 'Nama Kelas',
            'status' => 'Status',
            'waktu_order' => 'Waktu Order',
            'tanggal_order' => 'Tanggal Order',
            'approval_date' => 'Tanggal Persetujuan',
        ];
    }
    // atur id trx
    public function beforeSave($insert)
        {
            if ($insert) {
                // generate id_trx baru
                $last = self::find()->orderBy(['id_trx' => SORT_DESC])->one();
                if ($last) {
                    // ambil angka terakhir dari format TX-000001
                    $lastNumber = (int) substr($last->id_trx, 3);
                    $newNumber = $lastNumber + 1;
                } else {
                    $newNumber = 1;
                }

                // simpan dengan format TX-000001
                $this->id_trx = 'TX-' . str_pad($newNumber, 6, '0', STR_PAD_LEFT);
            }
            return parent::beforeSave($insert);
        }

    // relasi antar tabel -> models/OrderKelas.php
        public function getSiswa()
        {
            return $this->hasOne(Siswa::class, ['id_siswa' => 'id_siswa']);
        }

        public function getKelas()
        {
            return $this->hasOne(Kelas::class, ['id_kelas' => 'id_kelas']);
        }

        public function getIdTa()
        {
            return $this->kelas ? $this->kelas->id_ta : null;
        }
        public function getTahunAjaranLabel()
        {
            return $this->kelas && $this->kelas->tahunAjaran
                ? $this->kelas->tahunAjaran->tahun . ' - ' . $this->kelas->tahunAjaran->periode
                : null;
        }




}
