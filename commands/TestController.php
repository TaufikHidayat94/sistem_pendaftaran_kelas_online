<?php

namespace app\commands;

use yii\console\Controller;
use app\models\User;

class TestController extends Controller
{
    public function actionCheckUser()
    {
        $user = User::findByUsername('demo');
        var_dump($user !== null, $user?->validatePassword('demo'));
    }
}
