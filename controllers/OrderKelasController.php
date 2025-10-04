<?php

namespace app\controllers;

use app\models\OrderKelas;
use app\models\OrderKelasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderKelasController implements the CRUD actions for OrderKelas model.
 */
class OrderKelasController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all OrderKelas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OrderKelasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OrderKelas model.
     * @param string $id_trx Id Trx
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_trx)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_trx),
        ]);
    }

    /**
     * Creates a new OrderKelas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new OrderKelas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_trx' => $model->id_trx]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing OrderKelas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id_trx Id Trx
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_trx)
    {
        $model = $this->findModel($id_trx);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            \Yii::$app->session->setFlash('success', 'Data Pemesanan Kelas Berhasil Diubah!');
            return $this->redirect(['view', 'id_trx' => $model->id_trx]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing OrderKelas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id_trx Id Trx
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_trx)
    {
        $this->findModel($id_trx)->delete();
        \Yii::$app->session->setFlash('success', 'Data Pemesanan Kelas Berhasil Dihapus!');

        return $this->redirect(['index']);
    }

    /**
     * Finds the OrderKelas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_trx Id Trx
     * @return OrderKelas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_trx)
    {
        if (($model = OrderKelas::findOne(['id_trx' => $id_trx])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
