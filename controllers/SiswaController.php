<?php

namespace app\controllers;

use app\models\Siswa;
use app\models\SiswaSearch;
use app\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Yii;
use \dominus77\sweetalert2\Alert;
use app\models\Kelas;
use app\models\OrderKelas;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;


/**
 * SiswaController implements the CRUD actions for Siswa model.
 */
class SiswaController extends Controller
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
                        //'matchCallback' => function ($rule, $action) {
                          //  return Yii::$app->user->identity->role === 'admin'; 
                        //}
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
     * Lists all Siswa models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SiswaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Siswa model.
     * @param string $id_siswa Id Siswa
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_siswa)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_siswa),
        ]);
    }

    /**
     * Creates a new Siswa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Siswa();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                //tambahan alert
                Yii::$app->session->setFlash('success', 'Data Berhasil Disimpan!');
                // redirect ke view, pakai id_siswa yang sudah otomatis digenerate
                return $this->redirect(['view', 'id_siswa' => $model->id_siswa]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Siswa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id_siswa Id Siswa
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_siswa)
    {
        $model = $this->findModel($id_siswa);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            //tambahan alert
            Yii::$app->session->setFlash('success', 'Data Berhasil Diubah!');
            return $this->redirect(['view', 'id_siswa' => $model->id_siswa]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Siswa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id_siswa Id Siswa
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_siswa)
    {
        $this->findModel($id_siswa)->delete();
        //tambahan alert
        Yii::$app->session->setFlash('success', 'Data Berhasil Dihapus!');

        return $this->redirect(['index']);
    }

    /**
     * Finds the Siswa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_siswa Id Siswa
     * @return Siswa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_siswa)
    {
        if (($model = Siswa::findOne(['id_siswa' => $id_siswa])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Halaman yang anda cari tidak ada.');
    }

    // lihat daftar kelas
        public function actionDaftar($id_kelas)
        {
        $kelas = Kelas::findOne($id_kelas);
        if (!$kelas || $kelas->sisaKuota <= 0) {
            Yii::$app->session->setFlash('error', 'Kuota penuh.');
            return $this->redirect(['index-kelas']);
        }

        // cari siswa berdasarkan username login
        $siswa = Yii::$app->user->identity->siswa;
        if (!$siswa) {
            Yii::$app->session->setFlash('error', 'Data siswa tidak ditemukan.');
            return $this->redirect(['index-kelas']);
        }

        // cek apakah sudah pernah daftar kelas yang sama
        $sudahAda = OrderKelas::find()
            ->where(['id_siswa' => $siswa->id_siswa, 'id_kelas' => $id_kelas])
            ->exists();

        if ($sudahAda) {
            Yii::$app->session->setFlash('warning', 'Anda sudah terdaftar di kelas ini.');
            return $this->redirect(['index-kelas']);
        }

        // buat order baru
        $order = new OrderKelas();
        $order->id_siswa = $siswa->id_siswa;
        $order->id_kelas = $id_kelas;
        $order->status = 'approved'; // langsung approve otomatis
        $order->tanggal_order = date('Y-m-d');
        $order->waktu_order = date('H:i:s');
        $order->approval_date = date('Y-m-d H:i:s'); // isi otomatis


        if ($order->save()) {
            $kelas->updateCounters(['terdaftar' => 1]);

            // ambil email siswa
            $email = $siswa->email;  // pastikan ada kolom email di tabel siswa

            // kirim email
            if ($order->save()) {
                $kelas->updateCounters(['terdaftar' => 1]);

               try {
                    $result = Yii::$app->mailer->compose()
                        ->setFrom(['taufikhidayat.bzz@gmail.com' => 'Sistem Pendaftaran Kelas'])
                        ->setTo($siswa->email)
                        ->setSubject('Konfirmasi Pendaftaran Kelas')
                        ->setTextBody("Halo {$siswa->nama_siswa}, Anda berhasil mendaftar ke kelas {$kelas->nama_kelas}. Terima kasih!")
                        ->send();

                    if ($result) {
                        Yii::$app->session->setFlash('success', 'Pendaftaran berhasil, email terkirim.');
                    } else {
                        Yii::$app->session->setFlash('warning', 'Pendaftaran berhasil, tapi email gagal terkirim.');
                    }
                } catch (\Throwable $e) {
                    // tampilkan error detail di layar
                    Yii::$app->session->setFlash('error', 'Mailer Error: ' . $e->getMessage());
                    echo "<pre>";
                    print_r($e);
                    echo "</pre>";
                    Yii::error("Mailer Error Detail: " . $e->getTraceAsString(), __METHOD__);
                    return;
                } 

            }

            
        } else {
            Yii::$app->session->setFlash('error', json_encode($order->errors));
        }

        return $this->redirect(['index-kelas']);
    }


    // index baru untuk siswa
   public function actionIndexKelas()
    {
    $query = \app\models\Kelas::find()
        ->joinWith(['pengajar', 'tahunAjaran']); 

    $dataProvider = new \yii\data\ActiveDataProvider([
        'query' => $query,
        'sort' => [
            'defaultOrder' => [
                'tahunAjaranLabel' => SORT_DESC, // default desc
                ],
            'attributes' => [
                'nama_kelas',
                'terdaftar',
                'kapasitas',
                'pengajar.nama_pengajar' => [
                    'asc' => ['pengajar.nama_pengajar' => SORT_ASC],
                    'desc' => ['pengajar.nama_pengajar' => SORT_DESC],
                    'default' => SORT_ASC,
                    'label' => 'Pengajar',
                ],
                'tahunAjaranLabel' => [
                    'asc' => ['tahun_ajaran.tahun' => SORT_ASC, 'tahun_ajaran.periode' => SORT_ASC],
                    'desc' => ['tahun_ajaran.tahun' => SORT_DESC, 'tahun_ajaran.periode' => SORT_DESC],
                    'default' => SORT_DESC,
                    'label' => 'Tahun Ajaran',
                ],
            ],
        ],
    ]);

        return $this->render('index-kelas', [
            'dataProvider' => $dataProvider,
        ]);
    }


    // untuk lihat daftar kelas saya
    public function actionKelasSaya()
    {
        $siswa = Yii::$app->user->identity->siswa;

        if (!$siswa) {
            Yii::$app->session->setFlash('error', 'Data siswa tidak ditemukan.');
            return $this->redirect(['index-kelas']);
        }

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => \app\models\OrderKelas::find()
                ->where(['id_siswa' => $siswa->id_siswa])
                ->with('kelas'),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('kelas-saya', [
            'dataProvider' => $dataProvider,
        ]);
    }

    // fungsi untuk membatalkan pendaftaran kelas
    public function actionBatalkan($id_trx)
        {
            $order = \app\models\OrderKelas::findOne($id_trx);
            if ($order) {
                $order->status = 'batal'; // status batal
                $order->save(false);
                Yii::$app->session->setFlash('success', 'Pendaftaran berhasil dibatalkan.');
            }
            return $this->redirect(['kelas-saya']);
        }

    // fungsi menampilkan profil
    public function actionProfil()
    {
        $user = Yii::$app->user->identity;

        if ($user->role !== 'siswa') {
            throw new \yii\web\ForbiddenHttpException('Anda tidak memiliki akses ke halaman ini.');
        }

        $model = \app\models\Siswa::findOne(['id_user' => $user->id_user]);
        if (!$model) {
            throw new \yii\web\NotFoundHttpException('Data siswa tidak ditemukan.');
        }

        return $this->render('profil', [
            'model' => $model,
        ]);
    }

    // fungsi mengedit profil
    public function actionEditProfil()
        {
        $user = Yii::$app->user->identity;

        if ($user->role !== 'siswa') {
            throw new \yii\web\ForbiddenHttpException('Anda tidak memiliki akses ke halaman ini.');
        }

        $model = \app\models\Siswa::findOne(['id_user' => $user->id_user]);
        if (!$model) {
            throw new \yii\web\NotFoundHttpException('Data siswa tidak ditemukan.');
        }

        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'foto');
            if ($file) {
                $fileName = 'siswa_' . $model->id_siswa . '.' . $file->extension;
                $path = Yii::getAlias('@webroot/uploads/siswa/') . $fileName;

                if ($file->saveAs($path)) {
                    $model->foto = $fileName;
                }
            }

            if ($model->save(false)) {
                Yii::$app->session->setFlash('success', 'Profil berhasil diperbarui.');
                return $this->redirect(['profil']);
            } else {
                Yii::$app->session->setFlash('error', 'Terjadi kesalahan saat menyimpan data.');
                return $this->redirect(['profil']);
            }
        }

        return $this->render('edit-profil', [
            'model' => $model,
        ]);
    }
    // tombol ajukan ulang pendaftaran
    public function actionAjukanUlang($id_trx)
        {
            $order = \app\models\OrderKelas::findOne($id_trx);
            if ($order) {
                $order->status = 'pending'; // ajukan ulang status jadi pending
                $order->approval_date = null;
                $order->save(false);
                Yii::$app->session->setFlash('success', 'Pendaftaran berhasil diajukan ulang.');
            }
           return $this->redirect(Yii::$app->request->referrer ?: ['siswa/kelas-saya']);

        }


}
