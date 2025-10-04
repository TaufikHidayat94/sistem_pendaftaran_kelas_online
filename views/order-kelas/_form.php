<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Siswa;
use app\models\Kelas;

/** @var yii\web\View $this */
/** @var app\models\OrderKelas $model */
/** @var yii\widgets\ActiveForm $form */
?>
<section class="content">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<div class="order-kelas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_trx')->textInput([
        'maxlength' => true,
        'readonly' => true, // tidak bisa diubah tapi ikut submit
    ]) ?>

    <?= $form->field($model, 'id_siswa')->dropDownList(
        ArrayHelper::map(Siswa::find()->all(), 'id_siswa', 'nama_siswa'),
        ['prompt' => 'Pilih Siswa']
    ) ?>

    <?= $form->field($model, 'id_kelas')->dropDownList(
        ArrayHelper::map(Kelas::find()->all(), 'id_kelas', 'nama_kelas'),
        ['prompt' => 'Pilih Kelas']
    ) ?>


    <?= $form->field($model, 'status')->dropDownList(
        [
            'approved' => 'Approved',
            'reject'   => 'Reject',
            'pending'   => 'Pending',
            'batal' => 'Batal',
        ],
        ['prompt' => 'Pilih Status']
    ) ?>


    <?= $form->field($model, 'waktu_order')->textInput([
        'value' => date('H:i:s'),
        'readonly' => true
    ]) ?>

    <?= $form->field($model, 'tanggal_order')->textInput([
        'value' => date('Y-m-d'),
        'readonly' => true
    ]) ?>

    <?= $form->field($model, 'approval_date')->textInput([
        'value' => date('Y-m-d H:i:s'),
        'readonly' => true
    ]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
</div>
</div>
</section>

