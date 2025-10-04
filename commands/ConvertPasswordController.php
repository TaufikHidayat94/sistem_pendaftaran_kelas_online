<?php
namespace app\commands;

use Yii;
use yii\console\Controller;
use app\models\User;

class ConvertPasswordController extends Controller
{
    public function actionRun()
    {
        $users = User::find()->all();
        foreach ($users as $user) {
            if (!empty($user->password) && empty($user->password_hash)) {
                $user->password_hash = Yii::$app->security->generatePasswordHash($user->password);
                $user->auth_key = Yii::$app->security->generateRandomString();
                $user->save(false);
                echo "Converted user: {$user->username}\n";
            }
        }
    }
}
