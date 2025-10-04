<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\TahunAjaran $model */

$this->title = 'Data Tahun Ajaran';
$this->params['breadcrumbs'][] = ['label' => 'Data Tahun Ajaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<section class="content">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<div class="tahun-ajaran-view">


    <p>
        <?= Html::a('Update Data', ['update', 'id_ta' => $model->id_ta], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus Data', ['delete', 'id_ta' => $model->id_ta], [
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
            //'id_ta',
            'tahun',
            'periode',
        ],
    ]) ?>

</div>
</div>
</div>
</div>
</div>
</section>
