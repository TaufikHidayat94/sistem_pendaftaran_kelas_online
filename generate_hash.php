<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';

// Inisialisasi aplikasi console
$config = require __DIR__ . '/config/console.php';
new yii\console\Application($config);

// Generate hash password
$passwords = ['demo', 'admin'];

foreach ($passwords as $password) {
    $hash = Yii::$app->security->generatePasswordHash($password);
    echo "Hash untuk '{$password}':\n{$hash}\n\n";
}
