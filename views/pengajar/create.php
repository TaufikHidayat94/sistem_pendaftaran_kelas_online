<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pengajar $model */

$this->title = 'Rekam Data Pengajar Baru';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Pengajar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengajar-create">


    <?= $this->render('_form', [
        'model' => $model,
        'listPendidikan' => $listPendidikan,
    ]) ?>

</div>
