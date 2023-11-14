<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\bootstrap5\Modal;

?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?= HtmlPurifier::process($model->title) ?></h5><br/> 
        <p class="card-text"><?= HtmlPurifier::process($model->content) ?></p> <br/> 
        <span class="blockquote-footer"><?= 'Автор: '. HtmlPurifier::process($model->author) ?><br/></span>
        <span class="text-muted"><?= 'Создан: '. HtmlPurifier::process($model->created) ?></span>
        <span class="text-muted"><?= 'Изменен: '. HtmlPurifier::process($model->updated) ?></span><br/>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <?= Html::a('Изменить пост',['update', 'id' => $model->id], ['class' => 'btn btn-outline-primary me-md-2']); ?>
            <?php Modal::begin([
                'title' => 'Вы уверены, что хотите удалить пост?',
                'toggleButton' => ['label' => 'Удалить пост', 'class' => 'btn btn-outline-primary'],
            ]);?>
            <p><?= 'Отменить действие будет невозможно' ?></p><br/> 
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <?= Html::a('Удалить', ['delete', 'id' => $model->id], ['class' => 'btn btn-danger me-md-2']); ?>
                <?= Html::a('Отмена', ['index'], ['class' => 'btn btn-primary']); ?>
                <?php Modal::end()?>
            </div>
        </div>
    </div>
</div>



        
    
 