<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pengajar $model */

$this->title = 'Update Pengajar - ' . $model->nama_pengajar;
$this->params['breadcrumbs'][] = ['label' => 'Pengajars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_pengajar, 'url' => ['view', 'id_pengajar' => $model->id_pengajar]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="pengajar-update">


                        <?= $this->render('_form', [
                            'model' => $model,
                            'listPendidikan' => $listPendidikan,
                        ]) ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
