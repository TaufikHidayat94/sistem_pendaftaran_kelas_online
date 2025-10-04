<?php

use app\models\Pengajar;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\PengajarSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Daftar Pengajar';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="pengajar-index">


                        <p>
                            <?= Html::a('Rekam Data Pengajar', ['create'], ['class' => 'btn btn-success']) ?>
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

                                //'id_pengajar',
                                'nama_pengajar',
                                [
                                    'attribute' => 'id_pendidikan',
                                    'label' => 'Pendidikan',
                                    'value' => function ($model){
                                        return $model->pendidikanNama ? $model->pendidikanNama->pendidikan : '-';
                                    },
                                ],
                                'tanggal_terdaftar',
                                'kontak',
                                //'username',
                                //'email:email',
                                [
                                    'class' => 'kartik\grid\ActionColumn',
                                    'header' => 'Aksi',
                                    'width' => '150px',
                                    'template' => '{view} {update} {delete}',
                                    'buttons' => [
                                    'view' => function($url, $model) {
                                    return Html::a('<span class = "btn btn-xs btn-primary"><b class="fas fa-eye"></b></span>',
                                        ['view', 'id_pengajar' => $model->id_pengajar],
                                        ['title' => 'Detil']);
                                    },
                                    'update' => function($url, $model) {
                                        return Html::a('<span class = "btn btn-xs btn-success"><b class="fas fa-edit"></b></span>',
                                        ['update', 'id_pengajar' => $model->id_pengajar],
                                        ['title' => 'Ubah']);
                                    },
                                    'delete' => function($url, $model) {
                                        return Html::a('<span class = "btn btn-xs btn-danger"><b class="fa fa-trash"></b></span>',
                                            ['delete', 'id_pengajar' => $model->id_pengajar],
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
                                
                                /* sebelum kartik 
                                [
                                    'class' => ActionColumn::className(),
                                    'urlCreator' => function ($action, Pengajar $model, $key, $index, $column) {
                                        return Url::toRoute([$action, 'id_pengajar' => $model->id_pengajar]);
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
