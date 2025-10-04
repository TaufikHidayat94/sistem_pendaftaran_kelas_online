<?php
use yii\helpers\Html;

/** @var \app\models\Kelas $kelas */
/** @var \app\models\OrderKelas[] $peserta */
?>

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Peserta Kelas: <?= Html::encode($kelas->nama_kelas) ?></h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Tanggal Daftar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($peserta as $i => $o): ?>
                                <tr>
                                    <td><?= $i+1 ?></td>
                                    <td><?= Html::encode($o->siswa->nama_siswa) ?></td>
                                    <td><?= Html::encode($o->siswa->email) ?></td>
                                    <td><?= Html::encode($o->status) ?></td>
                                    <td><?= Html::encode($o->tanggal_order) ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <?php if (empty($peserta)): ?>
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada peserta</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
