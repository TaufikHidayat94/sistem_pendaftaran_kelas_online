<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\OrderKelas $model */

$this->title = 'Detail Pemesanan Kelas';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Pemesanan Kelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<section class="content">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<div class="order-kelas-view">


    <p>
        <?= Html::a('Ubah', ['update', 'id_trx' => $model->id_trx], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id_trx' => $model->id_trx], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah anda yakin menghapus data ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_trx',
            [
                'label' => 'Nama Siswa',
                'value' => $model->siswa ? $model->siswa->nama_siswa : '-',
            ],
            [
                'label' => 'Nama Kelas',
                'value' => $model->kelas ? $model->kelas->nama_kelas : '-',
            ],
            [
                'label' => 'Tahun Ajaran',
                'value' => $model->tahunAjaranLabel ?: '-',
            ],

            'status',
            [
            'label' => 'Tanggal Order',
            'value' => $model->tanggal_order
                ? Yii::$app->formatter->asDate($model->tanggal_order, 'php:j F Y')
                  . ' | ' . Yii::$app->formatter->asTime($model->waktu_order, 'php:H:i:s')
                : '-',
            ],
            [
                'label' => 'Tanggal Persetujuan',
                'value' => $model->approval_date
                    ? Yii::$app->formatter->asDatetime($model->approval_date, 'php:j F Y \ \|\ \ H:i:s')
                    : '-',
            ],
        ],
    ]) ?>

</div>
</div>
</div>
</div>
</div>
</section>

