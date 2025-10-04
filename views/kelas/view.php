<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Kelas $model */

$this->title = 'Informasi Kelas '.$model->nama_kelas;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Kelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="kelas-view">


                        <p>
                            <?= Html::a('Update Data', ['update', 'id_kelas' => $model->id_kelas], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Hapus Data', ['delete', 'id_kelas' => $model->id_kelas], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Apakah anda yakin akan menghapus data ini?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </p>

                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'id_kelas',
                                'nama_kelas',
                                [
                                    'attribute' => 'id_pengajar',
                                    'value' => function ($model) {
                                        return $model->pengajarNama ? $model->pengajarNama->nama_pengajar : null;
                                    },
                                    'label' => 'Nama Pengajar',
                                ],
                                'kapasitas',
                                [
                                    'attribute' => 'id_ta',
                                    'value' => function ($model) {
                                        return $model->tahunAjaran ? $model->tahunAjaran->tahunPeriode : null;
                                    },
                                    'label' => 'Tahun Ajaran',
                                ],
                                'terdaftar',
                            ],
                        ]) ?>

                    </div>
                </div>
        </div>
    </div>
</div>
</section>

