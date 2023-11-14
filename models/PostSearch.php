<?php

namespace app\models;

use app\models\Post;
use app\models\PostQuery;
use yii\data\ActiveDataProvider;

class PostSearch extends Post
{
    public $created_from;
    public $created_to;
    public $updated_from;
    public $updated_to;

    public function rules()
    {
        return [
            [['title', 'author',], 'string'],
            [['created','updated','created_from','created_to','updated_from','updated_to'], 'safe'],
        ];
    } 

    public function search($params)
    {
        $postQuery = new PostQuery();
        $query = $postQuery->allPosts();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'title' => $this->title,
            'author' => $this->author,
        ]);

        if (!empty($this->created_to) && !empty($this->created_from)){
            $query->andWhere(['>=','created',$this->created_from.' 00:00:00'])->
                andWhere(['<=','created',$this->created_to.' 23:59:59']);
        }
        if (!empty($this->updated_to) && !empty($this->updated_from)){
            $query->andWhere(['>=','updated',$this->updated_from.' 00:00:00'])->
                andWhere(['<=','updated',$this->updated_to.' 23:59:59']);
        }

        return $dataProvider;
    }
}