<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Создать пост';
?>

<div>
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['id' => 'feedback-form', 'options' => ['novalidate' => '']]); ?>
        <?= $form->field($post, 'title')->textInput(); ?>
        <?= $form->field($post, 'content')->textarea(['rows' => 5]); ?>
        <?= $form->field($post, 'author')->textInput(); ?>
        <?= Html::submitButton('Сохранить'); ?>
    <?php ActiveForm::end(); ?>
</div>