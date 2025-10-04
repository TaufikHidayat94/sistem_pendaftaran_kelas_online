<?php

namespace app\controllers;

use app\models\Pengajar;
use app\models\PengajarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Yii;
use \dominus77\sweetalert2\Alert;


use yii\helpers\ArrayHelper; // untuk mencari query
use app\models\Pendidikan; // model untuk tabel pendidikan

/**
 * PengajarController implements the CRUD actions for Pengajar model.
 */
class PengajarController extends Controller
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
     * Lists all Pengajar models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PengajarSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pengajar model.
     * @param string $id_pengajar Id Pengajar
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_pengajar)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_pengajar),
        ]);
    }

    /**
     * Creates a new Pengajar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pengajar();

        // Ambil data pendidikan dari tabel pendidikan
        $listPendidikan = ArrayHelper::map(
            Pendidikan::find()->orderBy(['id_pendidikan' => SORT_DESC])->all(),
            'id_pendidikan',
            'pendidikan'
        );

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                if ($model->save()) {
                    // Jika berhasil
                    \Yii::$app->session->setFlash('success', 'Data Pengajar berhasil disimpan.');
                    return $this->redirect(['view', 'id_pengajar' => $model->id_pengajar]);
                } else {
                    // Jika gagal, tampilkan error validasi
                    \Yii::$app->session->setFlash('error', 'Gagal menyimpan data: ' . json_encode($model->errors));
                }
            } else {
                \Yii::$app->session->setFlash('error', 'Data POST tidak dapat dimuat ke model.');
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'listPendidikan' => $listPendidikan,
        ]);
    }


    /**
     * Updates an existing Pengajar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id_pengajar Id Pengajar
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_pengajar)
    {
        $model = $this->findModel($id_pengajar);

        $listPendidikan = ArrayHelper::map(
            Pendidikan::find()->orderBy(['id_pendidikan' => SORT_DESC])->all(),
            'id_pendidikan',
            'pendidikan'
        );

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                // Jika berhasil
                \Yii::$app->session->setFlash('success', 'Data Pengajar Berhasil Diubah!');
            return $this->redirect(['view', 'id_pengajar' => $model->id_pengajar]);
        }

        return $this->render('update', [
            'model' => $model,
            'listPendidikan' => $listPendidikan, // kirim ke view
        ]);
    }

    /**
     * Deletes an existing Pengajar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id_pengajar Id Pengajar
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_pengajar)
    {
        $this->findModel($id_pengajar)->delete();
                // tambahan alert
                \Yii::$app->session->setFlash('success', 'Data Pengajar Berhasil Dihapus!');

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pengajar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_pengajar Id Pengajar
     * @return Pengajar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pengajar)
    {
        if (($model = Pengajar::findOne(['id_pengajar' => $id_pengajar])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Halaman yang anda cari tidak ada.');
    }
}
