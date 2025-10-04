<?php
use yii\helpers\ArrayHelper;
use app\models\User;
use yii\helpers\Console;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';

// Ambil console config + test config
$consoleConfig = require __DIR__ . '/config/console.php';
$testConfig    = require __DIR__ . '/config/test.php';

// Merge biar user component tetap ada, DB override ke test
$config = ArrayHelper::merge($consoleConfig, $testConfig);

$application = new yii\console\Application($config);

// Safety check: pastikan DB yang dipakai test
if (strpos(Yii::$app->db->dsn, 'yii2basic_test') === false) {
    die("⚠️ Bukan DB test! Stop seeding.\n");
}

// Buat user demo
$demo = new User();
$demo->username = 'demo';
$demo->auth_key = 'testkey123';
$demo->password_hash = Yii::$app->security->generatePasswordHash('demo');
$demo->access_token = 'token123';
$demo->role = 'siswa';
$demo->id_user = 1;
$demo->save(false);

echo Console::ansiFormat("User demo berhasil dibuat\n", [Console::FG_GREEN]);

// Buat user admin
$admin = new User();
$admin->username = 'admin';
$admin->auth_key = 'test100key';
$admin->password_hash = Yii::$app->security->generatePasswordHash('admin');
$admin->access_token = '100-token';
$admin->role = 'siswa';
$admin->id_user = 100;
$admin->save(false);

echo Console::ansiFormat("User admin berhasil dibuat\n", [Console::FG_GREEN]);
