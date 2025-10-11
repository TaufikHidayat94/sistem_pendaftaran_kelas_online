<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

class UserController extends Controller
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * List User
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $query = User::find(); // menampilkan semua user dan role
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => ['username' => SORT_ASC],
            ],
            /* $dataProvider = new ActiveDataProvider([
                'query' => User::find()->where(['<>', 'role', 'admin']), // exclude administrator
            ]); */


        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel'  => $searchModel,
        ]);
    }

    /**
     * View User detail
     */
    public function actionView($id_user)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_user),
        ]);
    }

    /**
     * Create User
     */
    public function actionCreate()
    {
        $model = new User();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                // hash password
                if (!empty($model->password)) {
                    $model->password_hash = Yii::$app->security->generatePasswordHash($model->password);
                    $model->auth_key = Yii::$app->security->generateRandomString();
                }

                // set default role
                if (empty($model->role)) {
                    $model->role = 'siswa';
                }

                if ($model->save(false)) {
                    // entri otomatis ke tabel siswa
                    $siswa = new \app\models\Siswa();
                    $siswa->id_user = $model->id_user;
                    $siswa->nama_siswa = $model->username; // default menggunakan data username
                    $siswa->username   = $model->username; // kalau masih pakai kolom username
                    $siswa->email      = $model->email;
                    $siswa->tanggal_daftar = date('Y-m-d');

                    if ($siswa->save(false)) {
                        Yii::$app->session->setFlash('success', 'User baru berhasil dibuat beserta data siswa.');
                    } else {
                        Yii::$app->session->setFlash('warning', 'User berhasil dibuat, tetapi data siswa gagal tersimpan.');
                    }

                    return $this->redirect(['view', 'id_user' => $model->id_user]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Update User
     */
    public function actionUpdate($id_user)
    {
        $model = $this->findModel($id_user);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'User berhasil diperbarui.');
            return $this->redirect(['view', 'id_user' => $model->id_user]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Delete User
     */
    public function actionDelete($id_user)
    {
        $model = $this->findModel($id_user);

        // hapus data di tabel siswa dulu
        \app\models\Siswa::deleteAll(['id_user' => $id_user]);

        $model->delete();
        Yii::$app->session->setFlash('success', 'User dan data siswa terkait berhasil dihapus.');

        return $this->redirect(['index']);
    }


    /**
     * Find User model
     */
    protected function findModel($id_user)
    {
        if (($model = User::findOne($id_user)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('User tidak ditemukan.');
    }

    /**
     * Register User (otomatis role siswa + entri di tabel siswa)
     */
    public function actionRegister()
    {
        $model = new User();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());

            if (!empty($model->password)) {
                $model->password_hash = Yii::$app->security->generatePasswordHash($model->password);
                $model->auth_key = Yii::$app->security->generateRandomString();
            }

            // default role siswa
            $model->role = 'siswa';

            if ($model->save(false)) {
                // otomatis buat entri siswa
                $siswa = new \app\models\Siswa();
                $siswa->id_user = $model->id_user;
                $siswa->nama_siswa = $model->username;
                $siswa->username = $model->username;
                $siswa->email = $model->email;
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
