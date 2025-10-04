<?php

use app\models\OrderKelas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\OrderKelasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Daftar Pemesanan Kelas';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="order-kelas-index">

                        <?php Pjax::begin(); ?>
                        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                        <?= GridView::widget([
                                                'dataProvider' => $dataProvider,
                                                //'filterModel' => $searchModel,
                                                'summary' => 'Menampilkan {begin} - {end} dari {totalCount} data',
                                                'pager' => [
                                                            'options' => ['class' => 'pagination justify-content-center'], // posisi tengah
                                                            'linkOptions' => ['class' => 'page-link'],
                                                            'pageCssClass' => 'page-item',
                                                            'disabledPageCssClass' => 'disabled',
                                                            'prevPageLabel' => '«',
                                                            'nextPageLabel' => '»',
                                                        ],
                                                'columns' => [
                                                    ['class' => 'yii\grid\SerialColumn'],
                                //'id_trx',
                            [
                                    'attribute' => 'id_siswa',
                                    'label' => 'Nama Siswa',
                                    'value' => function ($model) {
                                        return $model->siswa ? $model->siswa->nama_siswa : '-';
                                    },
                                ],

                                [
                                    'attribute' => 'id_kelas',
                                    'label' => 'Nama Kelas',
                                    'value' => function ($model) {
                                        return $model->kelas ? $model->kelas->nama_kelas : '-';
                                    },
                                ],
                                [
                                    'attribute' => 'tahunAjaranLabel',
                                    'label' => 'Tahun Ajaran',
                                    'value' => function ($model) {
                                        return $model->tahunAjaranLabel ?: '-';
                                    },
                                ],

                                [
                                    'attribute' => 'status',
                                    'label' => 'Status',
                                    'format' => 'raw', // penting supaya HTML tidak di-escape
                                    'value' => function ($model) {
                                        if ($model->status === 'approved') {
                                            return '<span class="badge badge-success">Approved</span>';
                                        } elseif ($model->status === 'reject') {
                                            return '<span class="badge badge-danger">Rejected</span>';
                                        } elseif ($model->status === 'pending') {
                                            return '<span class="badge badge-danger">Pending</span>';
                                        } else {
                                            return '<span class="badge badge-secondary">' . Html::encode($model->status) . '</span>';
                                        }
                                    },
                                ],
                                //'waktu_order',
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
                                        return $tanggal . ($waktu ? " | " . $waktu : '');
                                    },
                                ],
                               // 'tanggal_order',
                               // 'approval_date',
                               [
                                    'attribute' => 'approval_date',
                                    'label' => 'Tanggal Persetujuan',
                                    'value' => function ($model) {
                                        return $model->approval_date
                                            ? Yii::$app->formatter->asDatetime($model->approval_date, 'php:j F Y \ \|\ \ H:i')
                                            : '-';
                                    },
                                ],
                                /* [
                                    'class' => ActionColumn::className(),
                                    'urlCreator' => function ($action, OrderKelas $model, $key, $index, $column) {
                                        return Url::toRoute([$action, 'id_trx' => $model->id_trx]);
                                    }
                                ], */
                                [
                                    'class' => 'kartik\grid\ActionColumn',
                                    'header' => 'Aksi',
                                    'width' => '150px',
                                    'template' => '{view} {update} {delete}',
                                    'buttons' => [
                                    'view' => function($url, $model) {
                                    return Html::a('<span class = "btn btn-xs btn-primary"><b class="fas fa-eye"></b></span>',
                                        ['view', 'id_trx' => $model->id_trx],
                                        ['title' => 'Detil']);
                                    },
                                    'update' => function($url, $model) {
                                        return Html::a('<span class = "btn btn-xs btn-success"><b class="fas fa-edit"></b></span>',
                                        ['update', 'id_trx' => $model->id_trx],
                                        ['title' => 'Ubah']);
                                    },
                                    'delete' => function($url, $model) {
                                        return Html::a('<span class = "btn btn-xs btn-danger"><b class="fa fa-trash"></b></span>',
                                            ['delete', 'id_trx' => $model->id_trx],
                                            ['title' => 'Hapus',
                                                'class' => '',
                                                'data' => [
                                                    'confirm' => 'Apakah Anda Yakin Akan Menghapus Data Ini?',
                                                    'method' => 'post',
                                                    'data-pjax' => false
                                                            ],
                                                        ],
                                                    );
                                                },
                                            ],
                                    ],
                            ],
                        ]); ?>

                        <?php Pjax::end(); ?>

                    </div>
                </div>
        </div>
    </div>
</div>
</section>
