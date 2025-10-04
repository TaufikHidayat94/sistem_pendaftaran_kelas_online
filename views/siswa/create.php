<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Siswa $model */

$this->title = 'Rekam Data Siswa';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Siswa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="siswa-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
