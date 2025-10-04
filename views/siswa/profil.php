<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Profil Saya';
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Data Pribadi Siswa</h3>
            </div>
            <div class="card-body">

                <?= \dominus77\sweetalert2\Alert::widget(['useSessionFlash' => true]); ?>

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'nama_siswa',
                        'alamat',
                        'tempat_lahir',
                        [
                            'attribute' => 'tanggal_lahir',
                            'value' => Yii::$app->formatter->asDate($model->tanggal_lahir, 'php:d F Y'),
                        ],
                        'email:email',
                        [
                            'attribute' => 'tanggal_daftar',
                            'value' => Yii::$app->formatter->asDate($model->tanggal_daftar, 'php:d F Y'),
                        ],
                    ],
                ]) ?>
                <br>
                <p>
                    <?= Html::a('Edit Profil', ['edit-profil'], ['class' => 'btn btn-warning']) ?>
                </p>

            </div>
        </div>
    </div>
</div>
</section>

