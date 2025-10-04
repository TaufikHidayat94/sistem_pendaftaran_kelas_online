<?php
use yii\helpers\Html;
use yii\helpers\Url;

$role = Yii::$app->user->isGuest ? null : Yii::$app->user->identity->role;
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= Url::to(['/site/index']) ?>" class="brand-link">
        <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Pendaftaran Kelas</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- User Info -->
        <?php if (!Yii::$app->user->isGuest): ?>
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <?php 
                    $foto = !empty(Yii::$app->user->identity->siswa->foto) 
                        ? Yii::getAlias('@web/uploads/siswa/' . Yii::$app->user->identity->siswa->foto) 
                        : Yii::getAlias('@web/images/default-user.png'); // foto default
                    ?>
                    <img src="<?= $foto ?>" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">
                        <?= Yii::$app->user->identity->role === 'siswa'
                            ? Yii::$app->user->identity->siswa->nama_siswa
                            : Yii::$app->user->identity->username ?>
                    </a>
                </div>
            </div>
        <?php endif; ?>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                <?php if (Yii::$app->user->isGuest): ?>
                    <li class="nav-item">
                        <a href="<?= Url::to(['/site/login']) ?>" class="nav-link">
                            <i class="nav-icon fas fa-sign-in-alt"></i>
                            <p>Login</p>
                        </a>
                    </li>
                <?php else: ?>

                    <?php if ($role === 'admin'): ?>
                        <li class="nav-item">
                            <a href="index.php?r=site/dashboard" class="nav-link <?= Yii::$app->controller->id == 'site' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= Url::to(['/tahun-ajaran/index']) ?>" class="nav-link <?= Yii::$app->controller->id == 'tahun-ajaran' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>Tahun Ajaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= Url::to(['/siswa/index']) ?>" class="nav-link <?= Yii::$app->controller->id == 'siswa' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-user-graduate"></i>
                                <p>Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= Url::to(['/pengajar/index']) ?>" class="nav-link <?= Yii::$app->controller->id == 'pengajar' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                                <p>Pengajar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= Url::to(['/user/index']) ?>" class="nav-link <?= Yii::$app->controller->id == 'user' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-user-cog"></i>
                                <p>Manajemen User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link <?= Yii::$app->controller->id == 'kelas' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-house-user"></i>
                            Kelas
                            <i class="fas fa-angle-left right"></i></a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                            <a href="<?= Url::to(['/kelas/index']) ?>" class="nav-link <?= Yii::$app->controller->id == 'kelas' && Yii::$app->controller->action->id == 'index' ? 'active' : '' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            Kelola Kelas</a>
                            </li>
                            <li class="nav-item">
                            <a href="<?= Url::to(['/order-kelas/index']) ?>" class="nav-link <?= Yii::$app->controller->id == 'order-kelas' && Yii::$app->controller->action->id == 'index' ? 'active' : '' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            Pemesanan Kelas</a>
                            </li>
                            </ul>
                            </li>
                    <?php endif; ?>

                    <?php if ($role === 'siswa'): ?>
                        <li class="nav-item">
                            <a href="index.php?r=site/dashboard" class="nav-link <?= Yii::$app->controller->id == 'site' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= \yii\helpers\Url::to(['siswa/profil']) ?>" class="nav-link">
                                <i class="nav-icon fas fa-id-card"></i>
                                <p>Profil Saya</p>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a href="<?= Url::to(['/siswa/index-kelas']) ?>" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Lihat Kelas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?r=siswa/kelas-saya" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Kelas Saya</p>
                            </a>
                        </li>
                    <?php endif; ?>

                <?php endif; ?>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
