<?php

namespace app\controllers;

use app\models\TahunAjaran;
use app\models\TahunAjaranSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Yii;
use \dominus77\sweetalert2\Alert;

/**
 * TahunAjaranController implements the CRUD actions for TahunAjaran model.
 */
class TahunAjaranController extends Controller
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
     * Lists all TahunAjaran models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TahunAjaranSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TahunAjaran model.
     * @param int $id_ta Id Ta
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_ta)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_ta),
        ]);
    }

    /**
     * Creates a new TahunAjaran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
/*    public function actionCreate()
    {
        $model = new TahunAjaran();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_ta' => $model->id_ta]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    } */
        public function actionCreate()
    {
        $model = new TahunAjaran();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                //tambahan alert
                Yii::$app->session->setFlash('success', 'Data Berhasil Disimpan!');
                // redirect ke view, pakai id_ta yang sudah otomatis digenerate
                return $this->redirect(['view', 'id_ta' => $model->id_ta]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

        

    /**
     * Updates an existing TahunAjaran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_ta Id Ta
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_ta)
    {
        $model = $this->findModel($id_ta);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            //tambahan alert
            Yii::$app->session->setFlash('success', 'Data Berhasil Diubah!');
            return $this->redirect(['view', 'id_ta' => $model->id_ta]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TahunAjaran model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_ta Id Ta
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_ta)
    {
        $this->findModel($id_ta)->delete();
        //tambahan alert
        Yii::$app->session->setFlash('success', 'Data Berhasil Dihapus');

        return $this->redirect(['index']);
    }

    /**
     * Finds the TahunAjaran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_ta Id Ta
     * @return TahunAjaran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_ta)
    {
        if (($model = TahunAjaran::findOne(['id_ta' => $id_ta])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Halaman yang anda cari tidak ada.');
    }
}
