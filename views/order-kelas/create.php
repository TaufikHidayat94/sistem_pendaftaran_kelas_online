<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\OrderKelas $model */

$this->title = 'Buat Pemesanan Kelas';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Pemesanan Kelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<div class="order-kelas-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
</div>
</div>
</section>
