<?php

namespace app\controllers;

use app\models\Kelas;
use app\models\KelasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use Yii;
use \dominus77\sweetalert2\Alert;

use yii\helpers\ArrayHelper; // untuk mencari query
use app\models\Pengajar; // model untuk tabel pengajar
use app\models\TahunAjaran;

/**
 * KelasController implements the CRUD actions for Kelas model.
 */
class KelasController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
       /* return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        ); */
            return [
        'access' => [
            'class' => AccessControl::class,
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['@'], // hanya user yang login
                    'matchCallback' => function ($rule, $action) {
                        return Yii::$app->user->identity->role === 'admin'; 
                    }
                ],
            ],
            'denyCallback' => function () {
                throw new \yii\web\ForbiddenHttpException('Anda tidak memiliki izin untuk mengakses halaman ini.');
            },
        ],
        'verbs' => [
            'class' => VerbFilter::class,
            'actions' => [
                'delete' => ['POST'],
            ],
        ],
    ];
    }

    /**
     * Lists all Kelas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new KelasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        // Join relasi tahunAjaran untuk bisa sort
        $dataProvider->query->joinWith('tahunAjaran');

        // Set default sort: tahun ajaran descending
        $dataProvider->sort->defaultOrder = ['id_ta' => SORT_DESC];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kelas model.
     * @param string $id_kelas Id Kelas
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_kelas)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_kelas),
        ]);
    }

    /**
     * Creates a new Kelas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Kelas();

        // Ambil data pengajar dari tabel pengajar
        $listPengajar = ArrayHelper::map(
            Pengajar::find()->orderBy(['id_pengajar' => SORT_ASC])->all(),
            'id_pengajar',
            'nama_pengajar'
        );

        $listTahunAjaran = ArrayHelper::map(
        TahunAjaran::find()->orderBy(['tahun' => SORT_ASC])->all(),
        'id_ta',
        'tahunPeriode'   // ambil dari getter di model TahunAjaran
        );

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                if ($model->save()) {
                    // Jika berhasil
                    Yii::$app->session->setFlash('success', 'Data kelas berhasil disimpan.');
                    return $this->redirect(['view', 'id_kelas' => $model->id_kelas]);
                } else {
                    // Jika gagal simpan
                    Yii::$app->session->setFlash('error', 'Gagal menyimpan data: ' . json_encode($model->errors));
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'listPengajar' => $listPengajar,
            'listTahunAjaran' => $listTahunAjaran,
        ]);
    }


    /**
     * Updates an existing Kelas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id_kelas Id Kelas
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_kelas)
    {
        $model = $this->findModel($id_kelas);

        // Ambil data pengajar dari tabel pengajar
        $listPengajar = ArrayHelper::map(
            Pengajar::find()->orderBy(['id_pengajar' => SORT_ASC])->all(),
            'id_pengajar',
            'nama_pengajar'
        );

        $listTahunAjaran = ArrayHelper::map(
        TahunAjaran::find()->orderBy(['tahun' => SORT_ASC])->all(),
        'id_ta',
        'tahunPeriode'   // ambil dari getter di model TahunAjaran
        );

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            // Jika berhasil
                \Yii::$app->session->setFlash('success', 'Data Kelas Berhasil Diubah!');
            return $this->redirect(['view', 'id_kelas' => $model->id_kelas]);
        }

        return $this->render('update', [
            'model' => $model,
            'listPengajar' => $listPengajar,
            'listTahunAjaran' => $listTahunAjaran,
        ]);
    }

    /**
     * Deletes an existing Kelas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id_kelas Id Kelas
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_kelas)
    {
        $this->findModel($id_kelas)->delete();
        // tambahan alert
                \Yii::$app->session->setFlash('success', 'Data Kelas Berhasil Dihapus!');

        return $this->redirect(['index']);
    }

    /**
     * Finds the Kelas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_kelas Id Kelas
     * @return Kelas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_kelas)
    {
        if (($model = Kelas::findOne(['id_kelas' => $id_kelas])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    // lihat daftar peserta
    public function actionPeserta($id)
    {
        $kelas = Kelas::findOne($id);

        if (!$kelas) {
            throw new \yii\web\NotFoundHttpException("Kelas tidak ditemukan");
        }

        $peserta = OrderKelas::find()
            ->where(['id_kelas' => $id])
            ->with('siswa') // ikut load relasi siswa
            ->all();

        return $this->render('peserta', [
            'kelas' => $kelas,
            'peserta' => $peserta
        ]);
    }



}
