<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Data;

/**
 * DataSearch represents the model behind the search form about `app\models\Data`.
 */
class DataSearch extends Data
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'address_id'], 'integer'],
            [['card_number', 'date', 'service'], 'safe'],
            [['volume'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Data::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'volume' => $this->volume,
            'address_id' => $this->address_id,
        ]);

        $query->andFilterWhere(['like', 'card_number', $this->card_number])
            ->andFilterWhere(['like', 'service', $this->service]);
        if ($this->date == ''){
           $query->all();
        }
        if ($this->date == 'апрель'){
            $query->andFilterWhere(['>=',  'date','2015-04-01'])
                ->andFilterWhere(['<=', 'date', '2015-05-01']);
        }
        if ($this->date == 'май'){
            $query->andFilterWhere(['>=',  'date','2015-05-01'])
                ->andFilterWhere(['<=', 'date', '2015-06-01']);
        }
        if ($this->date == 'июнь'){
            $query->andFilterWhere(['>=',  'date','2015-06-01'])
                ->andFilterWhere(['<=', 'date', '2015-07-01']);
        }
        if ($this->date == 'июль'){
            $query->andFilterWhere(['>=',  'date','2015-07-01'])
                ->andFilterWhere(['<=', 'date', '2015-08-01']);
        }
        if ($this->date == 'август'){
            $query->andFilterWhere(['>=',  'date','2015-08-01'])
                ->andFilterWhere(['<=', 'date', '2015-09-01']);
        }
        if ($this->date == 'сентябрь'){
            $query->andFilterWhere(['>=',  'date','2015-09-01'])
                ->andFilterWhere(['<=', 'date', '2015-10-01']);
        }
        if ($this->date == 'октябрь'){
            $query->andFilterWhere(['>=',  'date','2015-10-01'])
                ->andFilterWhere(['<=', 'date', '2015-11-01']);
        }

        return $dataProvider;
    }
}
