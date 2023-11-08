<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = 'Посты';
?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>
    
    <p><a href="<?= Url::toRoute(['posts/create']); ?>">Добавить пост</a></p>
    <ul>
        <?php foreach ($posts as $post): ?>
            <li>
                <?= $post->title ?><br/>
                <?= $post->content ?><br/>
                <?= 'Автор: '. $post->author ?><br/>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<?= LinkPager::widget(['pagination' => $pagination]) ?>