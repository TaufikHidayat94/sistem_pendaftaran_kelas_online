<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = 'Detail User';
$this->params['breadcrumbs'][] = ['label' => 'Daftar User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <div class="user-view">


                    <p>
                        <?= Html::a('Update User', ['update', 'id_user' => $model->id_user], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Hapus User', ['delete', 'id_user' => $model->id_user], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Anda Yakin Akan Menghapus Data Ini?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </p>

                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            //'id_user',
                            'username',
                            'email:email',
                            //'password_hash',
                            //'auth_key',
                            //'access_token',
                            'role',
                        ],
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>
</section>
