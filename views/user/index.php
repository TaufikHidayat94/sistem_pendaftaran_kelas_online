<?php

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Daftar User';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="user-index">

                        <p>
                            <?= Html::a('Rekam User Baru', ['create'], ['class' => 'btn btn-success']) ?>
                        </p>

                        <?php Pjax::begin(); ?>
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

                                //'id_user',
                                'username',
                                [
                                    'attribute' => 'namaSiswa',
                                    'label' => 'Pengguna'
                                ],
                                'email:email',
                                'role',
                                [
                                    'class' => 'kartik\grid\ActionColumn',
                                    'header' => 'Aksi',
                                    'width' => '150px',
                                    'template' => '{view} {update} {delete}',
                                    'urlCreator' => function ($action, $model, $key, $index) {
                                        return Url::to([$action, 'id_user' => $model->id_user]);
                                    },
                                    'buttons' => [
                                        'view' => function($url, $model) {
                                            return Html::a('<span class="btn btn-xs btn-primary"><b class="fas fa-eye"></b></span>',
                                                ['view', 'id_user' => $model->id_user],
                                                ['title' => 'Detil']
                                            );
                                        },
                                        'update' => function($url, $model) {
                                            return Html::a('<span class="btn btn-xs btn-success"><b class="fas fa-edit"></b></span>',
                                                ['update', 'id_user' => $model->id_user],
                                                ['title' => 'Ubah']
                                            );
                                        },
                                        'delete' => function($url, $model) {
                                            return Html::a('<span class="btn btn-xs btn-danger"><b class="fa fa-trash"></b></span>',
                                                ['delete', 'id_user' => $model->id_user],
                                                [
                                                    'title' => 'Hapus',
                                                    'data' => [
                                                        'confirm' => 'Apakah Anda Yakin Akan Menghapus Data Ini?',
                                                        'method' => 'post',
                                                        'data-pjax' => false
                                                    ],
                                                ]
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
