<?php
namespace tests\_support\Helper;

use yii\test\ActiveFixture;
use app\models\User;

class UserFixture extends ActiveFixture
{
    public $modelClass = User::class;

    // Optional: supaya bisa load dari _data/user.php
    public $dataFile = '@tests/_data/user.php';
}
