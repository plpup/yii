<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\views\_search;
use yii\widgets\ListView;

$this->title = 'Посты';
?>

<div class="container">
    <div style="height: 8rem">
        <h1><?= Html::encode($this->title) ?></h1>
        <div class="d-grid gap-2 d-md-flex">
            <?= Html::a('Добавить пост',['create'], ['class' => 'btn btn-outline-primary']) ?>
            <button class="btn btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#collapseExample">
                Поиск постов
            </button>
        </div>
    </div> 
    
    <?= $this->render('_search', [
        'model' => $posts,
    ]) ?>
    
    <?=ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_posts',
        'summary'=>'',
        'options' => ['class' => 'row gy-5',],
        'pager' => [
            'pageCssClass' => 'page-link',
            'activePageCssClass' => 'active',
            'prevPageCssClass' => 'page-link',
            'firstPageCssClass' => 'page-link',
            'nextPageCssClass' => 'page-link',
            'lastPageCssClass' => 'page-link',
            'firstPageLabel' => '<<',
            'lastPageLabel' => '>>',
            'nextPageLabel' => '>',
            'prevPageLabel' => '<',
            'maxButtonCount' => 3,
        ],
    ]);?>
</div>
