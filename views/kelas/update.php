<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Kelas $model */

$this->title = 'Update Data Kelas ' . $model->nama_kelas;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Kelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_kelas, 'url' => ['view', 'id_kelas' => $model->id_kelas]];
$this->params['breadcrumbs'][] = 'Update';
?>
                    <div class="kelas-update">


                        <?= $this->render('_form', [
                            'model' => $model,
                            'listPengajar' => $listPengajar,
                            'listTahunAjaran' => $listTahunAjaran,
                        ]) ?>

                    </div>
                </div>
        </div>
    </div>
</div>
</section>
