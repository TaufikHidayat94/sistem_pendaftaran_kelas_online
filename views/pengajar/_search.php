<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PengajarSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pengajar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_pengajar') ?>

    <?= $form->field($model, 'nama_pengajar') ?>

    <?= $form->field($model, 'pendidikan') ?>

    <?= $form->field($model, 'tanggal_terdaftar') ?>

    <?= $form->field($model, 'kontak') ?>

    <?php // echo $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'email') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
