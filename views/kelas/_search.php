<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\KelasSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="kelas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_kelas') ?>

    <?= $form->field($model, 'nama_kelas') ?>

    <?= $form->field($model, 'id_pengajar') ?>

    <?= $form->field($model, 'kapasitas') ?>

    <?= $form->field($model, 'id_ta') ?>

    <?php // echo $form->field($model, 'terdaftar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
