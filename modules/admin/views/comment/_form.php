<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\models\News;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Comment */
/* @var $form yii\widgets\ActiveForm */

$date = new DateTime();
$datetime = $date->format('Y-m-d H:i:s');
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'news_id')->dropdownList(News::find()->select(['news_id'])->indexBy('news_id')->column(),
        ['prompt'=>'Select news_id']
    );?>

    <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'datetime')->textInput(['value' => $datetime]) ?>

    <?= $form->field($model, 'deleted')->dropdownList(['0' => 'Активен', '1'=> 'Не Актиен']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
