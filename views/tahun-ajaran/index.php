<?php

use app\models\TahunAjaran;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\TahunAjaranSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Daftar Tahun Ajaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="tahun-ajaran-index">

                        <p>
                            <?= Html::a('Rekam Data Baru', ['create'], ['class' => 'btn btn-success']) ?>
                        </p>

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

                                //'id_ta',
                                'tahun',
                                'periode',
                                    [
                                    'class' => 'kartik\grid\ActionColumn',
                                    'header' => 'Aksi',
                                    'width' => '150px',
                                    'template' => '{view} {update} {delete}',
                                    'buttons' => [
                                    'view' => function($url, $model) {
                                    return Html::a('<span class = "btn btn-xs btn-primary"><b class="fas fa-eye"></b></span>',
                                        ['view', 'id_ta' => $model->id_ta],
                                        ['title' => 'Detil']);
                                    },
                                    'update' => function($url, $model) {
                                    return Html::a('<span class = "btn btn-xs btn-success"><b class="fas fa-edit"></b></span>',
                                        ['update', 'id_ta' => $model->id_ta],
                                        ['title' => 'Ubah']);
                                    },
                                    'delete' => function($url, $model) {
                                    return Html::a('<span class = "btn btn-xs btn-danger"><b class="fa fa-trash"></b></span>',
                                        ['delete', 'id_ta' => $model->id_ta],
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

                                    // script action sebelum diganti ke kartik
                                    /* 'class' => ActionColumn::className(),
                                    'urlCreator' => function ($action, TahunAjaran $model, $key, $index, $column) {
                                     return Url::toRoute([$action, 'id_ta' => $model->id_ta]);
                                    }
                                ], */
                            ],
                        ]); ?>

                    <?php Pjax::end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
</section>