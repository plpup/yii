<?php

use yii\views\_form;

$this->title = 'Изменить пост';
?>

<?= $this->render('_form', [
    'model' => $post,
]) ?>