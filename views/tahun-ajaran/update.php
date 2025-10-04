<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TahunAjaran $model */

$this->title = 'Update Tahun Ajaran: ';
$this->params['breadcrumbs'][] = ['label' => 'Update Tahun Ajaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ta, 'url' => ['view', 'id_ta' => $model->id_ta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="tahun-ajaran-update">


                        <?= $this->render('_form', [
                            'model' => $model,
                        ]) ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

