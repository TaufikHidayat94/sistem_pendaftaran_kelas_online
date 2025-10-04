<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\web\NotFoundHttpException;
use app\models\User;
use yii\data\ActiveDataProvider;

class UserController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('User tidak ditemukan.');
    }
    public function actionRegister()
    {
        $model = new User();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());

            if (!empty($model->password)) {
                $model->password_hash = Yii::$app->security->generatePasswordHash($model->password);
                $model->auth_key = Yii::$app->security->generateRandomString();
            }

            if ($model->save(false)) {
                // otomatis buat entri siswa
                $siswa = new \app\models\Siswa();
                $siswa->id_user = $model->id_user; // relasi ke user
                $siswa->nama_siswa = $model->username; // sementara, bisa diganti form tambahan
                $siswa->email = $model->email;        // opsional
                $siswa->tanggal_daftar = date('Y-m-d');
                $siswa->save(false);

                Yii::$app->session->setFlash('success', 'Pendaftaran berhasil. Silakan login.');
                return $this->redirect(['site/login']);
            } else {
                Yii::$app->session->setFlash('error', 'Gagal membuat user.');
            }
        }

        return $this->render('register', [
            'model' => $model,
        ]);
    }

}
