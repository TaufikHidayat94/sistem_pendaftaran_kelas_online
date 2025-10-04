<?php
use yii\helpers\Html;
use kartik\grid\GridView;

/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Daftar Kelas Tersedia';
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
                            'nama_kelas',
                            [
                                'attribute' => 'kapasitas',
                                'label' => 'Kuota',
                            ],
                            [
                                'label' => 'Terdaftar',
                                'value' => function($model) {
                                    return \app\models\OrderKelas::find()
                                        ->where(['id_kelas' => $model->id_kelas])
                                        ->andWhere(['status' => ['approved','pending']])
                                        ->count();
                                }
                            ],
                            [
                                'label' => 'Sisa Kuota',
                                'value' => function($model) {
                                    $terdaftar = \app\models\OrderKelas::find()
                                        ->where(['id_kelas' => $model->id_kelas])
                                        ->andWhere(['status' => ['approved','pending']])
                                        ->count();
                                    return $model->kapasitas - $terdaftar;
                                }
                            ],
                            [
                                'attribute' => 'tahunAjaranLabel',
                                'label' => 'Tahun Ajaran',
                                'value' => function ($model) {
                                    return $model->tahunAjaranLabel;
                                },
                            ],
                            [
                                'attribute' => 'pengajar.nama_pengajar',
                                'label' => 'Pengajar',
                                'value' => function ($model) {
                                    return $model->pengajar ? $model->pengajar->nama_pengajar : '-';
                                },
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{daftar}',
                                'buttons' => [
                                    'daftar' => function ($url, $model) {
                                        $siswa = Yii::$app->user->identity->siswa ?? null;
                                        if (!$siswa) {
                                            return '';
                                        }

                                        $order = \app\models\OrderKelas::find()
                                            ->where([
                                                'id_siswa' => $siswa->id_siswa,
                                                'id_kelas' => $model->id_kelas
                                            ])
                                            ->orderBy(['tanggal_order' => SORT_DESC])
                                            ->one();

                                        if ($order) {
                                            if ($order->status === 'approved') {
                                                return Html::tag('span', 'Sudah Terdaftar', ['class' => 'badge badge-success']);
                                            } elseif ($order->status === 'pending') {
                                                return Html::tag('span', 'Menunggu Persetujuan', ['class' => 'badge badge-warning']);
                                            } 
                                            elseif ($order->status === 'batal') {
                                                return Html::a(
                                                    '<span class="btn btn-warning btn-sm"><i class="fas fa-redo"></i> Ajukan Ulang</span>',
                                                    ['siswa/ajukan-ulang', 'id_trx' => $order->id_trx],
                                                    [
                                                        'data' => [
                                                            'confirm' => 'Ajukan ulang pendaftaran ke kelas ini?',
                                                            'method' => 'post',
                                                        ],
                                                    ]
                                                );
                                            }
                                        }

                                        return Html::a('Daftar', ['siswa/daftar', 'id_kelas' => $model->id_kelas], [
                                            'class' => 'btn btn-sm btn-primary',
                                            'data' => [
                                                'confirm' => 'Yakin ingin mendaftar ke kelas ini?',
                                                'method' => 'post',
                                            ],
                                        ]);
                                    }
                                ]
                            ],
                        ],
                    ]); ?>

                </div>
            </div>
        </div>
    </div>
</section>
