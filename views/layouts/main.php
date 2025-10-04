<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;


\hail812\adminlte3\assets\FontAwesomeAsset::register($this);
\hail812\adminlte3\assets\AdminLteAsset::register($this);
$this->registerCssFile('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback');
$this->registerCssFile('@web/css/custom.css');


$assetDir = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');

$publishedRes = Yii::$app->assetManager->publish('@vendor/hail812/yii2-adminlte3/src/web/js');
$this->registerJsFile($publishedRes[1].'/control_sidebar.js', ['depends' => '\hail812\adminlte3\assets\AdminLteAsset']);
?>
<?php \dominus77\sweetalert2\Alert::widget(['useSessionFlash' => true]); ?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php
    $this->registerJsFile('https://cdn.jsdelivr.net/npm/sweetalert2@11', [
        'depends' => [\yii\web\JqueryAsset::class],
    ]);
    ?>
    <?php $this->head() ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="hold-transition sidebar-mini">
<?php \dominus77\sweetalert2\Alert::widget(['useSessionFlash' => true]); ?>
<?php $this->beginBody() ?>

<div class="wrapper">
    <!-- Navbar -->
    <?= $this->render('navbar', ['assetDir' => $assetDir]) ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?= $this->render('sidebar', ['assetDir' => $assetDir]) ?>

    <!-- Content Wrapper. Contains page content -->
    <?= $this->render('content', ['content' => $content, 'assetDir' => $assetDir]) ?>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <?= $this->render('control-sidebar') ?>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <?= $this->render('footer') ?>
</div>
<?php
    $logoutUrl = \yii\helpers\Url::to(['site/logout']);
    $loginUrl = \yii\helpers\Url::to(['site/login']);
    $csrf = Yii::$app->request->getCsrfToken();

    $script = <<<JS
    $(document).on("click", "#logout-link", function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Yakin Akan Akhiri Sesi Ini?',
            text: "Anda akan logout dari sistem",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Logout',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post('$logoutUrl', {_csrf: '$csrf'}, function() {
                    window.location.href = '$loginUrl';
                });
            }
        });
    });
    JS;

    $this->registerJs($script);
?>



<?php $this->endBody() ?>
<?php
$logoutUrl = \yii\helpers\Url::to(['site/logout']);
$loginUrl = \yii\helpers\Url::to(['site/login']);
$script = <<<JS
document.addEventListener("DOMContentLoaded", function() {
    const logoutLink = document.getElementById("logout-link");
    if (logoutLink) {
        logoutLink.addEventListener("click", function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Yakin Akan Akhiri Sesi Ini?',
                text: "Anda akan logout dari sistem",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Logout',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // logout pakai POST 
                    fetch('$logoutUrl', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-Token': yii.getCsrfToken()
                        }
                    }).then(() => {
                        window.location.href = '$loginUrl';
                    });
                }
            });
        });
    }
});
JS;
$this->registerJs($script);
?>

</body>
</html>
<?php $this->endPage() ?>
