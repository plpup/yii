<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<div class="container">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['id' => 'post-form']); ?>
        <?= $form->field($model, 'title')->textInput()->hint('Введите название')->label('Заголовок'); ?>
        <?= $form->field($model, 'content')->textarea(['rows' => 5])->hint('Введите текст')->label('Содержание'); ?>
        <?= $form->field($model, 'author')->textInput()->hint('Введите ваше Имя и Фамилию')->label('Автор'); ?>
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Обновить', ['class'=>"btn btn-success"]); ?>
    <?php ActiveForm::end(); ?>
</div>