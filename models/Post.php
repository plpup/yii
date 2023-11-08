<?php

namespace app\models;

use yii\db\ActiveRecord;

class Post extends ActiveRecord
{
    public static function tablename(){
        return 'posts';
    }
    public function atributeLabels(){
        return[
            'title' => 'title', 'content' => 'text', 'author' => 'author',
        ];
    }
    public function rules(){
        return[
            [['title', 'content', 'author'], 'required']
        ];
    }  
}