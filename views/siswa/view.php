<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Siswa $model */

$this->title = 'Profil Siswa';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Siswa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="siswa-view">


                        <p>
                            <?= Html::a('Update Data', ['update', 'id_siswa' => $model->id_siswa], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Hapus Data', ['delete', 'id_siswa' => $model->id_siswa], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Anda Yakin Akan Menghapus Data Ini?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </p>

                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                //'id_siswa',
                                'nama_siswa',
                                'alamat',
                                'tempat_lahir',
                                [
                                    'attribute' => 'Tanggal Lahir',
                                    'value' => function($model){
                                    return date("d F Y", strtotime($model->tanggal_lahir));
                                    },
                                ],
                                [
                                    'attribute' => 'Tanggal Daftar',
                                    'value' => function($model){
                                    return date("d F Y", strtotime($model->tanggal_daftar));
                                    },
                                ],
                                'username',
                                'email:email',
                                'kontak',
                            ],
                        ]) ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
