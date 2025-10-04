<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\Siswa $model */
/** @var yii\widgets\ActiveForm $form */
?>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="siswa-form">

                        <?php $form = ActiveForm::begin(); ?>


                        <?= $form->field($model, 'nama_siswa')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'tanggal_lahir')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'Pilih Tanggal...'],
                                        'pluginOptions' => [
                                        'autoclose' => true,
                                        'format' => 'yyyy-mm-dd'
                                        ]
                        ]);
                        ?>

                        <?= $form->field($model, 'tanggal_daftar')->widget(DatePicker::classname(), [
                            'options' => [
                                'placeholder' => 'Pilih Tanggal...',
                                'value' => date('Y-m-d') // default hari ini
                            ],
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd'
                            ]
                        ]); ?>

                        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'kontak')->textInput(['maxlength' => true]) ?>

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