<?php
use yii\helpers\Html;

$this->title = "Dashboard Analitik";
?>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <?= Html::beginForm(['site/dashboard'], 'get') ?>
                            <?= Html::dropDownList('id_ta', $id_ta, $tahunAjaranList, [
                                'class' => 'form-control',
                                'prompt' => 'Pilih Tahun Ajaran',
                                'onchange' => 'this.form.submit()'
                            ]) ?>
                            <?= Html::endForm() ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h4>Kuota vs Pendaftar per Kelas</h4>
                            <canvas id="kuotaChart"></canvas>
                        </div>
                        <div class="col-md-6">
                            <h4>Pendaftar per Hari</h4>
                            <canvas id="pendaftarChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
// encode ke JSON
$kelasLabelsJson = json_encode($kelasLabels, JSON_UNESCAPED_UNICODE);
$kuotaDataJson = json_encode($kuotaData);
$terdaftarDataJson = json_encode($terdaftarData);
$tanggalJson = json_encode($tanggal);
$jumlahJson = json_encode($jumlah);

$js = <<<JS
console.log("DEBUG Dashboard Data:");
console.log("Kelas Labels:", $kelasLabelsJson);
console.log("Kuota Data:", $kuotaDataJson);
console.log("Terdaftar Data:", $terdaftarDataJson);
console.log("Tanggal:", $tanggalJson);
console.log("Jumlah:", $jumlahJson);

// Chart Kuota
var ctx1 = document.getElementById('kuotaChart').getContext('2d');
new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: $kelasLabelsJson,
        datasets: [
            {
                label: 'Kuota',
                data: $kuotaDataJson,
                backgroundColor: 'rgba(54, 162, 235, 0.5)'
            },
            {
                label: 'Terdaftar',
                data: $terdaftarDataJson,
                backgroundColor: 'rgba(255, 99, 132, 0.5)'
            }
        ]
    },
    options: { responsive: true }
});

// Chart Pendaftar Harian
var ctx2 = document.getElementById('pendaftarChart').getContext('2d');
new Chart(ctx2, {
    type: 'line',
    data: {
        labels: $tanggalJson,
        datasets: [{
            label: 'Pendaftar',
            data: $jumlahJson,
            borderColor: 'rgba(75, 192, 192, 1)',
            fill: false,
            tension: 0.1
        }]
    },
    options: { responsive: true }
});
JS;

$this->registerJs($js);
?>