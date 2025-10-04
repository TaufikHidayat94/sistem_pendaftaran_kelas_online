<?php

use app\models\Kelas;
use app\models\KelasSearch;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\KelasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Daftar Kelas';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <div class="kelas-index">


                    <p>
                        <?= Html::a('Rekam Kelas Baru', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>

                    <?php Pjax::begin(); ?>
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'summary' => 'Menampilkan {begin} - {end} dari {totalCount} data',
                        'pager' => [
                            'options' => ['class' => 'pagination justify-content-center'],
                            'linkOptions' => ['class' => 'page-link'],
                            'pageCssClass' => 'page-item',
                            'disabledPageCssClass' => 'disabled',
                            'prevPageLabel' => '«',
                            'nextPageLabel' => '»',
                        ],
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
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
                                'enableSorting' => true, // sortable
                            ],
                            'terdaftar',
                            [
                                'class' => 'kartik\grid\ActionColumn',
                                'header' => 'Aksi',
                                'width' => '150px',
                                'template' => '{view} {update} {delete}',
                                'buttons' => [
                                    'view' => function($url, $model) {
                                        return Html::a('<span class="btn btn-xs btn-primary"><i class="fas fa-eye"></i></span>',
                                            ['view', 'id_kelas' => $model->id_kelas], ['title' => 'Detil']);
                                    },
                                    'update' => function($url, $model) {
                                        return Html::a('<span class="btn btn-xs btn-success"><i class="fas fa-edit"></i></span>',
                                            ['update', 'id_kelas' => $model->id_kelas], ['title' => 'Ubah']);
                                    },
                                    'delete' => function($url, $model) {
                                        return Html::a('<span class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></span>',
                                            ['delete', 'id_kelas' => $model->id_kelas],
                                            [
                                                'title' => 'Hapus',
                                                'data' => [
                                                    'confirm' => 'Apakah Anda Yakin Akan Menghapus Data Ini?',
                                                    'method' => 'post',
                                                    'data-pjax' => false,
                                                ],
                                            ]);
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
