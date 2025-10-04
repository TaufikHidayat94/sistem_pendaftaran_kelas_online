<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TahunAjaran $model */

$this->title = 'Input Tahun Ajaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<div class="tahun-ajaran-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
</div>
</div>
</section>