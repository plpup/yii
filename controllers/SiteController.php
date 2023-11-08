<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\EntryForm;


class SiteController extends Controller
{
    
    public function actionSay($message = 'Привет')
    {
        return $this->render('say', ['message' => $message]);
    }

    public function actionEntry()
    {
        $model = new EntryForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // данные в $model удачно проверены

            // делаем что-то полезное с $model ...
 
            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('entry', ['model' => $model]);
        }
    }
}
