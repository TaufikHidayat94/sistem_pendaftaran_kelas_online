<?php

use yii\helpers\Html;

?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <?php if (Yii::$app->user->isGuest): ?>
                <a id="dropdownSubMenu1" href="<?= \yii\helpers\Url::to(['site/login']) ?>" 
                aria-expanded="false" class="nav-link">
                    <i class="fas fa-sign-in-alt"></i> Log In
                </a>
            <?php else: ?>
                <?php
                    $identity = Yii::$app->user->identity;
                    if ($identity->role === 'admin') {
                        $displayName = 'Administrator';
                    } elseif ($identity->role === 'siswa' && !empty($identity->siswa)) {
                        $displayName = $identity->siswa->nama_siswa;
                    } else {
                        $displayName = $identity->username;
                    }
                ?>
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                    <?= $displayName ?>
                </a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                    <li>
                        <a href="#" id="logout-link" class="dropdown-item">
                            <i class="fas fa-sign-out-alt"></i> Log Out
                        </a>
                    </li>
                </ul>
            <?php endif; ?>
        </li>
    </ul>
</nav>
<!-- /.navbar -->