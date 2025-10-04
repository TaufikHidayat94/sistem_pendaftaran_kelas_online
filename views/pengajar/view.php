<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Pengajar $model */

$this->title = 'Profil Pengajar';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Pengajar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                        <div class="pengajar-view">


                            <p>
                                <?= Html::a('Update Data', ['update', 'id_pengajar' => $model->id_pengajar], ['class' => 'btn btn-primary']) ?>
                                <?= Html::a('Hapus Data', ['delete', 'id_pengajar' => $model->id_pengajar], [
                                    'class' => 'btn btn-danger',
                                    'data' => [
                                        'confirm' => 'Apakah Anda Yakin Akan Menghapus Data Tersebut?',
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            </p>

                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'id_pengajar',
                                    'nama_pengajar',
                                    [
                                        'attribute' => 'pendidikan',
                                        'value' => $model->pendidikanNama ? $model->pendidikanNama->pendidikan : null,
                                    ],
                                    [
                                        'attribute' => 'Tanggal Daftar',
                                        'value' => function($model){
                                        return date("d F Y", strtotime($model->tanggal_terdaftar));
                                        },
                                    ],
                                    'kontak',
                                    'username',
                                    'email:email',
                                ],
                            ]) ?>


                        </div>
                </div>
            </div>
        </div>
    </div>
</section>

