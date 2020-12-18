<?php


namespace app\models;

use Yii;
use app\models\Resume;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class ResumeSearch extends Resume
{
//    public function rules()
//    {
//        // только поля определенные в rules() будут доступны для поиска
//        return [
//            [['id'], 'integer'],
//            [['title', 'creation_date'], 'safe'],
//        ];
//    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Resume::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // загружаем данные формы поиска и производим валидацию
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        // изменяем запрос добавляя в его фильтрацию
        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'salary', $this->salary])
            ->andFilterWhere(['like', 'specialization', $this->specialization])
            ->andFilterWhere(['like', 'experience', $this->experience])
            ->andFilterWhere(['like', 'employment', $this->employment])
            ->andFilterWhere(['like', 'shedule', $this->shedule]);

        return $dataProvider;
    }
}