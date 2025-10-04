<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

$this->title = 'Edit Profil';
$this->params['breadcrumbs'][] = ['label' => 'Profil Saya', 'url' => ['profil']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Profil <?= Html::encode($model->nama_siswa) ?></h3>
            </div>
            <div class="card-body">

                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                <?= $form->field($model, 'nama_siswa')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'alamat')->textarea(['rows' => 3]) ?>
                <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'tanggal_lahir')->widget(DatePicker::classname(), [
                            'options' => [
                                'placeholder' => 'Pilih Tanggal...',
                                'value' => date('Y-m-d') // default hari ini
                            ],
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd'
                            ]
                        ]); ?>
                <?= $form->field($model, 'email')->input('email') ?>
                <?= $form->field($model, 'kontak')->textInput(['maxlength' => true]) ?>
                <?php if ($model->foto): ?>
                    <div class="mb-3">
                        <img src="<?= Yii::getAlias('@web/uploads/siswa/' . $model->foto) ?>" class="img-thumbnail" width="120">
                    </div>
                <?php endif; ?>
                <?= $form->field($model, 'foto')->fileInput() ?>


                <div class="form-group">
                    <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
                    <?= Html::a('Batal', ['profil'], ['class' => 'btn btn-secondary']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>
</section>
