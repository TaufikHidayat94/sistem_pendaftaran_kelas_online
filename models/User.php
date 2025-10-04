<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    
    public static function tableName()
    {
        return 'user'; // tabel di database Anda
    }

    public static function primaryKey()
    {
        return ['id_user'];
    }


    public static function findIdentity($id)
    {
        return static::findOne(['id_user' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null; 
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public function getId()
    {
        return $this->id_user;
    }

    public function getAuthKey()
    {
        return null; // bisa diabaikan kalau tidak pakai rememberMe
    }

    public function validateAuthKey($authKey)
    {
        return true;
    }

   /* public function validatePassword($password)
    {
        // sementara password plain-text, nanti bisa di-hash
        return $this->password === $password;
    } */
   public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function getSiswa()
    {
        return $this->hasOne(\app\models\Siswa::class, ['id_user' => 'id_user']);
    }
    public function getNamaSiswa()
    {
        return $this->siswa ? $this->siswa->nama_siswa : '-';
    }




    public $password; // field virtual
    public function rules()
    {
        return [
            [['username'], 'required'],
            ['email', 'email'],
            [['username', 'email'], 'unique'],
            ['role', 'default', 'value' => 'siswa'],
            ['role', 'in', 'range' => ['admin','siswa']],
            [['password'], 'safe'],
        ];
    }
    public function beforeSave($insert)
    {
        if ($insert) {
            // generate id_user otomatis
            if (empty($this->id_user)) {
                $last = self::find()->orderBy(['id_user' => SORT_DESC])->one();
                if ($last) {
                    // ambil angka dari format U-xxxxx
                    $lastNumber = (int)substr($last->id_user, 2);
                    $newNumber = $lastNumber + 1;
                } else {
                    $newNumber = 1;
                }
                $this->id_user = 'U-' . str_pad($newNumber, 6, '0', STR_PAD_LEFT);
            }

            // hash password kalau ada input
            if (!empty($this->password)) {
                $this->password_hash = Yii::$app->security->generatePasswordHash($this->password);
                $this->auth_key = Yii::$app->security->generateRandomString();
            }
        }
        return parent::beforeSave($insert);
    }
    public function getDisplayName()
    {
        if ($this->role === 'admin') {
            return 'Administrator';
        }

        if ($this->role === 'siswa' && $this->siswa) {
            return $this->siswa->nama_siswa;
        }

    }



}
