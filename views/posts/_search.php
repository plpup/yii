<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\date\DatePicker;

?>

<?php $form = ActiveForm::begin([ 'action' => ['index'],'method' => 'get','id' => 'search-form']); ?>
<div class="collapse" id="collapseExample">
<form>
    <div class="row gy-2 gx-3 align-items-center">
        <div class="row mb-3">
            <div class="col-sm-4 col-form-label">
                <p><?= $form->field($model, 'title')->textInput()->label('Заголовок'); ?></p>
            </div>
            <div class="col-sm-4 col-form-label">
                <p><?= $form->field($model, 'author')->textInput()->label('Автор'); ?></p>
            </div>
            <div class="col-auto">
                <span>Время создания</span>
                <?= DatePicker::widget([
                    'model' => $model,
                    'attribute' => 'created_from',
                    'attribute2' => 'created_to',
                    'options' => ['placeholder' => 'С', 'safe'],
                    'options2' => ['placeholder' => 'По', 'safe'],
                    'type' => DatePicker::TYPE_RANGE,
                    'form' => $form,
                    'separator' => 'по',
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'autoclose' => true,
                    ]])?>
            </div>
            <div class="col-auto">
                <span>Время обновления</span>
                <?= DatePicker::widget([
                    'model' => $model,
                    'attribute' => 'updated_from',
                    'attribute2' => 'updated_to',
                    'options' => ['placeholder' => 'С', 'safe'],
                    'options2' => ['placeholder' => 'По', 'safe'],
                    'type' => DatePicker::TYPE_RANGE,
                    'form' => $form,
                    'separator' => 'по',
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'autoclose' => true,
                    ]])?>
            </div>
            <div class="gy-4 d-grid gap-2 d-md-block">
                <?= Html::submitButton('Поиск', ['class' => 'btn btn-outline-primary']); ?>
                <?= Html::submitButton('Сбросить', ['name' => 'reset', 'class' => 'btn btn-outline-primary']); ?>
            </div>
        </div>
    </div>
</form>
</div>
<?php ActiveForm::end(); ?>
