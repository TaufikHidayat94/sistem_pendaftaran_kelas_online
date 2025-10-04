<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\OrderKelasSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-kelas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_trx') ?>

    <?= $form->field($model, 'id_siswa') ?>

    <?= $form->field($model, 'id_kelas') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'waktu_order') ?>

    <?php // echo $form->field($model, 'tanggal_order') ?>

    <?php // echo $form->field($model, 'approval_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
