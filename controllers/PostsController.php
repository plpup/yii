<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Post;
use app\models\PostSearch;
use app\models\PostQuery;
use yii\data\ActiveDataProvider;

class PostsController extends Controller
{ 
    public function actionCreate() 
    {
        $post = new Post();
        
        if ($post->load(Yii::$app->request->post())) {
            if ($post->save()) {
                Yii::$app->session->setFlash('success','Успешно');
                return $this->redirect('index');
            }else {
                Yii::$app->session->setFlash('unsuccess','Ошибка');
            }
        }

        return $this->render('create', ['post' => $post]);
    }

    public function actionUpdate($id)
    {
        $postQuery = new PostQuery();
        $post = $postQuery->onePost($id);

        if (!$post){
            return $this->redirect(Yii::$app->request->referrer);
        }

        if ($post->load(Yii::$app->request->post())) {
            if ($post->save()) {
                Yii::$app->session->setFlash('success', 'Успешно');
                return $this->redirect('index');
            } else {
                Yii::$app->session->setFlash('unsuccess', 'Ошибка');
            }
        }

        return $this->render('update', ['post' => $post]);
    }

    public function actionDelete($id)
    {
        $postQuery = new PostQuery();
        $post = $postQuery->onePost($id);
        $post->delete();
        return $this->redirect(['index']);
    }

    public function actionIndex()
    {
        $posts = new PostSearch();
        $dataProvider = $posts->search(Yii::$app->request->queryParams);
        
        if (array_key_exists('reset', Yii::$app->request->get())) {
            return $this->redirect(['index']);
        }
    
        return $this->render('index', [
            'posts'  => $posts,
            'dataProvider' => $dataProvider,
        ]);
        
    }
}