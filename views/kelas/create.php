<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Kelas $model */

$this->title = 'Rekam Data Kelas';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Kelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelas-create">


    <?= $this->render('_form', [
        'model' => $model,
        'listPengajar' => $listPengajar,
        'listTahunAjaran' => $listTahunAjaran,
    ]) ?>

</div>
