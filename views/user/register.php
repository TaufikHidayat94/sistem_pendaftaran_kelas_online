<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Register User Baru';
?>
<section class="content">
    <div class="row">
        <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Formulir Registrasi User</h3>
            </div>
                <div class="card-body">
                    <div class="user-register">

                        <?php $form = ActiveForm::begin(); ?>

                        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Register', ['class' => 'btn btn-success']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                        <br>
                        Lengkapi data anda setelah berhasil registrasi di menu Profil.
                    </div>
            </div>
        </div>
    </div>
</div>
</section>
<?php
// jika flash sukses, tampilkan sweetalert + redirect
if (Yii::$app->session->hasFlash('success')) {
    $loginUrl = \yii\helpers\Url::to(['site/login']);
    $this->registerJs(<<<JS
        Swal.fire({
            icon: 'success',
            title: 'Pendaftaran Berhasil!',
            text: 'Silakan login menggunakan akun yang baru dibuat.',
            showConfirmButton: false,
            timer: 2500
        }).then(() => {
            window.location.href = '$loginUrl';
        });
    JS);
}
?>
