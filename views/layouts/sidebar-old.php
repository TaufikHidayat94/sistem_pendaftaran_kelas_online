<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Pendaftaran Kelas</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= Yii::$app->user->identity->username ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            // echo \hail812\adminlte\widgets\Menu::widget([
            //     'items' => [
            //         [
            //             'label' => 'Starter Pages',
            //             'icon' => 'tachometer-alt',
            //             'badge' => '<span class="right badge badge-info">2</span>',
            //             'items' => [
            //                 ['label' => 'Active Page', 'url' => ['site/index'], 'iconStyle' => 'far'],
            //                 ['label' => 'Inactive Page', 'iconStyle' => 'far'],
            //             ]
            //         ],
            //         ['label' => 'Simple Link', 'icon' => 'th', 'badge' => '<span class="right badge badge-danger">New</span>'],
            //         ['label' => 'Yii2 PROVIDED', 'header' => true],
            //         ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
            //         ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
            //         ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
            //         ['label' => 'MULTI LEVEL EXAMPLE', 'header' => true],
            //         ['label' => 'Level1'],
            //         [
            //             'label' => 'Level1',
            //             'items' => [
            //                 ['label' => 'Level2', 'iconStyle' => 'far'],
            //                 [
            //                     'label' => 'Level2',
            //                     'iconStyle' => 'far',
            //                     'items' => [
            //                         ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
            //                         ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
            //                         ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle']
            //                     ]
            //                 ],
            //                 ['label' => 'Level2', 'iconStyle' => 'far']
            //             ]
            //         ],
            //         ['label' => 'Level1'],
            //         ['label' => 'LABELS', 'header' => true],
            //         ['label' => 'Important', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger'],
            //         ['label' => 'Warning', 'iconClass' => 'nav-icon far fa-circle text-warning'],
            //         ['label' => 'Informational', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
            //     ],
            // ]);
            ?>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                <a href="index.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                Dashboard</a>
                </li>
                <li class="nav-item">
                <a href="index.php?r=tahun-ajaran" class="nav-link">
                <i class="nav-icon fas fa-calendar-alt"></i>
                Tahun Ajaran</a>
                </li>
                <li class="nav-item">
                <a href="index.php?r=siswa" class="nav-link">
                <i class="nav-icon fas fa-user-graduate"></i>
                Siswa</a>
                </li>
                <li class="nav-item">
                <a href="index.php?r=pengajar" class="nav-link">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                Pengajar</a>
                </li>
                <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-house-user"></i>
                Kelas
                <i class="fas fa-angle-left right"></i></a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="index.php?r=kelas" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                Lihat</a>
                </li>
                <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                Daftar</a>
                </li>
                <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                Kelas Yang Diambil</a>
                </li>
                </ul>
                </li>
                </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>