<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pendidikan".
 *
 * @property string $id_pendidikan
 * @property string $pendidikan
 */
class Pendidikan extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pendidikan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pendidikan', 'pendidikan'], 'required'],
            [['id_pendidikan'], 'string', 'max' => 15],
            [['pendidikan'], 'string', 'max' => 100],
            [['id_pendidikan'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pendidikan' => 'Id Pendidikan',
            'pendidikan' => 'Pendidikan',
        ];
    }

}
