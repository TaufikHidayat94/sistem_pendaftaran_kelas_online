<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\OrderKelas $model */

$this->title = 'Ubah Data Pemesanan Kelas: ' . $model->id_trx;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Pemesanan Kelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_trx, 'url' => ['view', 'id_trx' => $model->id_trx]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="order-kelas-update">


                        <?= $this->render('_form', [
                            'model' => $model,
                        ]) ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
