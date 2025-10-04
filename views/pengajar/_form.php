<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;


/** @var yii\web\View $this */
/** @var app\models\Pengajar $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pengajar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_pengajar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pendidikan')->widget(Select2::className(),[
        'data' => $listPendidikan,
        'options' => ['placeholder' => 'Pilih Pendidikan...'],
        'theme' => Select2::THEME_BOOTSTRAP,
        'pluginOptions' => [
        'allowClear' => true
        ],
        ]) ?>
    <!-- <?= $form->field($model, 'pendidikan')->dropDownList(
        $listPendidikan,
        ['prompt' => 'Pilih Pendidikan...']
        ) ?> -->


    <?= $form->field($model, 'tanggal_terdaftar')->widget(DatePicker::classname(), [
                            'options' => [
                                'placeholder' => 'Pilih Tanggal...',
                                'value' => date('Y-m-d') // default hari ini
                            ],
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd'
                            ]
                        ]); ?>

    <?= $form->field($model, 'kontak')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
