<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Post extends ActiveRecord
{
    public static function tablename()
    {
        return 'posts';
    }
    
    public function atributeLabels()
    {
        return [
            'id' => 'id',
            'title' => 'Заголовок', 
            'content' => 'Содержание',
            'author' => 'Автор',
            'created' => 'Создан',
            'updated' => 'Изменен',
        ];
    }

    public function rules()
    {
        return [
            [['title', 'content', 'author',], 'required'],
            [['created', 'updated', ], 'safe'],
            [
                'author',
                'match',
                'pattern' => '/^[а-яА-Я]*\s[а-яА-Я]*$/u',
                'message' => 'Неправильно указан автор',
            ]
        ];
    }
    
    public function afterSave($insert, $changedAttributes)
    {
        if ($insert == false){
            $this->updateAttributes(['updated'=>date('Y-m-d H:i:s',strtotime(gmdate('Y-m-d H:i:s') . ' 3 hours'))]);
        }
        return parent::afterSave($insert, $changedAttributes);
    }
}