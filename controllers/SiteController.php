<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use \dominus77\sweetalert2\Alert;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']); // belum login → ke login
        }

        return $this->render('index'); // sudah login → render index
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
   /* public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    } */

    /**
     * Logout action.
     *
     * @return Response
     */
   /* public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    } */

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionHello ()
    {
        $say = 'Hei! Hello!';
        return $say;
    }
    public function actionSelamatDatang()
    {
        return $this->render('selamat-datang');
    }

    //login page new
    public function actionLogin()
    {
        $this->layout = 'main-login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new \app\models\LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['site/dashboard']);
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
    public function actionDashboard($id_ta = null)
    {
        // cari default tahun ajaran aktif (tahun ini + periode sesuai bulan sekarang)
        if ($id_ta === null) {
            $tahun = date('Y');
            $bulan = date('n'); // 1–12
            $periode = ($bulan <= 6) ? '1' : '2'; // asumsi periode = 1 / 2

            $taAktif = \app\models\TahunAjaran::find()
                ->where(['tahun' => $tahun, 'periode' => $periode])
                ->one();

            if ($taAktif) {
                $id_ta = $taAktif->id_ta;
            }
        }

        // dropdown tahun ajaran
        // dropdown tahun ajaran
        $tahunAjaranList = \app\models\TahunAjaran::find()
            ->select(["CONCAT(tahun, ' - Semester ', periode) AS label", 'id_ta'])
            ->orderBy(['tahun' => SORT_DESC, 'periode' => SORT_DESC])
            ->indexBy('id_ta')
            ->column();

        // filter kelas berdasarkan id_ta
        $kelasQuery = \app\models\Kelas::find()->with('pengajar');
        if ($id_ta) {
            $kelasQuery->andWhere(['id_ta' => $id_ta]);
        }
        $kelas = $kelasQuery->all();

        $kelasLabels = [];
        $kuotaData = [];
        $terdaftarData = [];

        foreach ($kelas as $k) {
            $kelasLabels[] = $k->nama_kelas;
            $kuotaData[] = $k->kapasitas;
            $terdaftarData[] = $k->terdaftar;
        }

        // pendaftar harian hanya dari kelas dengan id_ta yang dipilih
        $orderQuery = (new \yii\db\Query())
            ->select(["tanggal_order", "COUNT(*) as jumlah"])
            ->from('order_kelas o')
            ->leftJoin('kelas k', 'o.id_kelas = k.id_kelas');

        if ($id_ta) {
            $orderQuery->andWhere(['k.id_ta' => $id_ta]);
        }

        $pendaftarHarian = $orderQuery
            ->groupBy('tanggal_order')
            ->orderBy('tanggal_order ASC')
            ->limit(7)
            ->all();

        $tanggal = array_column($pendaftarHarian, 'tanggal_order');
        $jumlah = array_column($pendaftarHarian, 'jumlah');

        return $this->render('dashboard', [
            'tahunAjaranList' => $tahunAjaranList,
            'id_ta' => $id_ta,
            'kelasLabels' => $kelasLabels,
            'kuotaData' => $kuotaData,
            'terdaftarData' => $terdaftarData,
            'tanggal' => $tanggal,
            'jumlah' => $jumlah,
        ]);
    }

}
