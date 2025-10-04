<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TahunAjaran $model */
/** @var yii\widgets\ActiveForm $form */
?>
<section class="content">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<div class="tahun-ajaran-form">

    <?php $form = ActiveForm::begin(); ?>


<div class="row">
    <div class="col-3">
        <?= $form->field($model, 'tahun')->textInput(['maxlength' => true]) ?>
    </div>
</div>
<div class="row">
    <div class="col-3">
        <?= $form->field($model, 'periode')->textInput(['maxlength' => true]) ?>
    </div>
</div>
    <div class="form-group">
        <?= Html::submitButton('Simpan Data', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
</div>
</div>
</section>
