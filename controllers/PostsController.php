<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Posts;
use app\models\Post;

class PostsController extends Controller
{ 
    public function actionCreate() {
        $post = new Post();
        
        // если пришли post-данные
        if ($post->load(Yii::$app->request->post())) {
            // проверяем и сохраняем эти данные
            if ($post->save()) {
                Yii::$app->session->setFlash('success','Успешно');
                return $this->refresh();
            }
            else {
                Yii::$app->session->setFlash('unsuccess','Ошибка');
            }
        }

        return $this->render('create', ['post' => $post]);
    }

    public function actionIndex()
    {
        $query = Posts::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $posts = $query->orderBy('title')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'posts' => $posts,
            'pagination' => $pagination,
        ]);
    }
}