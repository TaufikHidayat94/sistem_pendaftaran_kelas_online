<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';

// pakai config console agar bisa akses DB
$config = require __DIR__ . '/config/console.php';
new yii\console\Application($config);

use app\models\User;

function checkUser($username, $password)
{
    $user = User::findByUsername($username);
    echo "=== Cek user: {$username} ===\n";
    if ($user) {
        echo "User ditemukan!\n";
        echo "Password '{$password}' valid? ";
        var_dump($user->validatePassword($password));
        echo "AuthKey: {$user->auth_key}\n";
        echo "AccessToken: {$user->access_token}\n";
    } else {
        echo "User tidak ditemukan!\n";
    }
    echo "-----------------------------\n";
}

// tes demo
checkUser('demo', 'demo');

// tes admin
checkUser('admin', 'admin');
