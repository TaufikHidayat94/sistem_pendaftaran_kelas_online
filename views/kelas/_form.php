<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var app\models\Kelas $model */
/** @var yii\widgets\ActiveForm $form */
?>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="kelas-form">

                        <?php $form = ActiveForm::begin(); ?>


                        <?= $form->field($model, 'nama_kelas')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'id_pengajar')->widget(Select2::className(),[
                                'data' => $listPengajar, 
                                'options' => ['placeholder' => 'Pilih Pengajar...'],
                                'theme' => Select2::THEME_BOOTSTRAP,
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]) ?>


                        <?= $form->field($model, 'kapasitas')->textInput() ?>

                        <?= $form->field($model, 'id_ta')->dropDownList(
                                $listTahunAjaran,
                                ['prompt' => 'Pilih Tahun Ajaran...']
                            ) ?>

                        <?= $form->field($model, 'terdaftar')->textInput() ?>

                        <div class="form-group">
                            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                    </div>
                </div>
        </div>
    </div>
</div>
</section>
