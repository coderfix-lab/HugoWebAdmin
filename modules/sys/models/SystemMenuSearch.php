<?php

namespace app\modules\sys\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sys\models\SystemMenu;
use yii\data\ArrayDataProvider;

/**
 * SystemMenuSearch represents the model behind the search form of `app\modules\sys\models\SystemMenu`.
 */
class SystemMenuSearch extends SystemMenu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pid', 'sort'], 'integer'],
            [['name', 'url', 'rbac_name', 'icon_style'], 'safe'],
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
        $query = SystemMenu::find();

        // add conditions that should always apply here

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
            'pid' => $this->pid,
            'sort' => $this->sort,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'rbac_name', $this->rbac_name])
            ->andFilterWhere(['like', 'icon_style', $this->icon_style]);


        return $dataProvider;
    }
}
