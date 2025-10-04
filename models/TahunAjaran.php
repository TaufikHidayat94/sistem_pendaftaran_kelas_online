<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "tahun_ajaran".
 *
 * @property int $id_ta
 * @property string $tahun
 * @property string $periode
 */
class TahunAjaran extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tahun_ajaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tahun', 'periode'], 'required',
            'message' => 'Kolom {attribute} Tidak Boleh Kosong!'],
            [['id_ta'], 'string', 'max' => 10],
            [['tahun'], 'string', 'max' => 4],
            [['periode'], 'string', 'max' => 1],
            [['id_ta'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_ta' => 'Kode TA',
            'tahun' => 'Tahun',
            'periode' => 'Periode',
        ];
    }
    public function beforeSave($insert)
    {
        if ($insert) {
            // Cari id_ta terakhir
            $lastId = self::find()
                ->select('id_ta')
                ->orderBy(['CAST(SUBSTRING(id_ta, 4) AS UNSIGNED)' => SORT_DESC])
                ->scalar();

            if ($lastId === null) {
                $newNumber = 1;
            } else {
                $lastNumber = (int) substr($lastId, 3); // ambil angka dari TA-XXXX
                $newNumber = $lastNumber + 1;
            }

            // Format jadi TA-XXXX
            $this->id_ta = 'TA-' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
        }

        return parent::beforeSave($insert);
    }

    // Relasi balik ke Kelas
    public function getKelas()
    {
        return $this->hasMany(Kelas::class, ['id_ta' => 'id_ta']);
    }

    // Getter untuk format "tahun - periode"
    public function getTahunPeriode()
    {
        return $this->tahun . ' - ' . $this->periode;
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
