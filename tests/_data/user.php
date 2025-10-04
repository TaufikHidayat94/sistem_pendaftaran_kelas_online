<?php
return [
    [
        'id_user' => 1,
        'username' => 'demo',
        'password_hash' => Yii::$app->security->generatePasswordHash('demo'),
        'auth_key' => 'testkey123',
        'access_token' => 'token123',
        'role' => 'siswa',
    ],
];
/*    'admin' => [
        'id' => 100,
        'username' => 'admin',
        'password_hash' => '$2y$13$W7rZvEjUfZxpDHMWb373Wu4iF/ki6nbSTA7LPLhmn3GN5AEi8fgju',
        'auth_key' => 'test100key',
        'access_token' => '100-token',
    ],
];
?> */