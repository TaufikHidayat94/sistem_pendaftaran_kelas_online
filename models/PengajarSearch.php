<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pengajar;

/**
 * PengajarSearch represents the model behind the search form of `app\models\Pengajar`.
 */
class PengajarSearch extends Pengajar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pengajar', 'nama_pengajar', 'pendidikan', 'tanggal_terdaftar', 'kontak', 'username', 'email'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = Pengajar::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'tanggal_terdaftar' => $this->tanggal_terdaftar,
        ]);

        $query->andFilterWhere(['like', 'id_pengajar', $this->id_pengajar])
            ->andFilterWhere(['like', 'nama_pengajar', $this->nama_pengajar])
            ->andFilterWhere(['like', 'pendidikan', $this->pendidikan])
            ->andFilterWhere(['like', 'kontak', $this->kontak])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
