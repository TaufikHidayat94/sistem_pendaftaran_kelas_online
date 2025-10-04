<?php
use kartik\grid\GridView;
use yii\helpers\Html;

/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Kelas Saya';
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'summary' => 'Menampilkan {begin} - {end} dari {totalCount} kelas',
                        'pager' => [
                            'options' => ['class' => 'pagination justify-content-center'],
                            'linkOptions' => ['class' => 'page-link'],
                            'pageCssClass' => 'page-item',
                            'prevPageLabel' => '«',
                            'nextPageLabel' => '»',
                        ],
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'label' => 'Nama Kelas',
                                'value' => function($model) {
                                    return $model->kelas ? $model->kelas->nama_kelas : '-';
                                }
                            ],
                            [
                                'attribute' => 'tanggal_order',
                                'label' => 'Tanggal Daftar',
                                'value' => function ($model) {
                                    $tanggal = $model->tanggal_order 
                                        ? Yii::$app->formatter->asDate($model->tanggal_order, 'php:j F Y') 
                                        : '-';
                                    $waktu = $model->waktu_order 
                                        ? Yii::$app->formatter->asTime($model->waktu_order, 'php:H:i') 
                                        : '';
                                    return $tanggal . ($waktu ? "  |  " . $waktu : '');
                                },
                            ],
                            [
                                'attribute' => 'status',
                                'format' => 'raw',
                                'value' => function($model) {
                                    $class = $model->status === 'approved' ? 'badge badge-success' : 'badge badge-warning';
                                    return Html::tag('span', ucfirst($model->status), ['class' => $class]);
                                }
                            ],
                            [
                                'attribute' => 'approval_date',
                                'label' => 'Waktu Persetujuan',
                                'value' => function ($model) {
                                    return $model->approval_date
                                        ? Yii::$app->formatter->asDatetime($model->approval_date, 'php:j F Y \ \| \  H:i')
                                        : '-';
                                },
                            ],
                           [
                                'class' => 'yii\grid\ActionColumn',
                                'header' => 'Aksi',
                                'template' => '{aksi}',
                                'buttons' => [
                                    'aksi' => function ($url, $model) {
                                        if ($model->status === 'reject') {
                                            return Html::a(
                                                '<span class="btn btn-warning btn-sm"><i class="fas fa-redo"></i> Ajukan Ulang</span>',
                                                ['siswa/ajukan-ulang', 'id_trx' => $model->id_trx],
                                                [
                                                    'data' => [
                                                        'confirm' => 'Ajukan ulang pendaftaran ke kelas ini?',
                                                        'method' => 'post',
                                                    ],
                                                ]
                                            );
                                        }

                                        if ($model->status === 'approved') {
                                            return Html::a(
                                                '<span class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Batalkan</span>',
                                                ['siswa/batalkan', 'id_trx' => $model->id_trx],
                                                [
                                                    'data' => [
                                                        'confirm' => 'Apakah Anda yakin ingin membatalkan pendaftaran ini?',
                                                        'method' => 'post',
                                                    ],
                                                ]
                                            );
                                        }

                                        return Html::tag('span', 'Tidak ada aksi', ['class' => 'text-muted']);
                                    },
                                ],
                            ],


                        ],
                    ]); ?>

                </div>
            </div>
        </div>
    </div>
</section>
