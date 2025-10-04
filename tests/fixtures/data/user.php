<?php
/*return [
    [
        'id_user' => 1,
        'username' => 'demo',
        'password_hash' => Yii::$app->security->generatePasswordHash('demo'),
        'auth_key' => 'testkey123',
        'access_token' => 'token123',
        'role' => 'siswa',
    ],
    [
        'id_user' => '100',
        'username' => 'admin',
        'password_hash' => '$2y$13$JcCTkVXq/3XJVthYsjo1XupHHR2CepfeK5K26UCCu1Due4QhbxH9m',
        'auth_key' => 'test100key',
        'access_token' => '100-token',
        'role' => 'siswa',
    ],
];

<?php */
return [
    [
        'id_user' => 1,
        'username' => 'demo',
        'password_hash' => '$2y$13$NwhGp5pGCbQtApoSc6NVzupBXgE8S9OJ6rVxjmgzOGDUjsfI.9Txi', // isi dengan hash dari password 'demo'
        'auth_key' => 'testkey123',
        'access_token' => 'token123',
        'role' => 'siswa',
    ],
    [
        'id_user' => 100,
        'username' => 'admin',
        'password_hash' => '$2y$13$gMKZj3vASDUfAtNqijMSJ.yv/egrgNLJuoENWwd1qmWPQ9e2yS4IS', // isi dengan hash dari password 'admin'
        'auth_key' => 'test100key',
        'access_token' => '100-token',
        'role' => 'siswa',
    ],
];