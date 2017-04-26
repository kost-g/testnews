<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-form">

    <? if (Yii::$app->session->hasFlash('success')):?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <? echo Yii::$app->session->getFlash('success');?>
        </div>
    <?endif;?>

    <? if (Yii::$app->session->hasFlash('error')):?>
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <? echo Yii::$app->session->getFlash('error');?>
        </div>
    <?endif;?>

    <?php Pjax::begin([]); ?>

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'news_id')->textInput(['maxlength' => true, 'value' => 0]) ?>

    <?= $form->field($model, 'nickname')->textInput(['maxlength' => true, ]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 4]) ?>

<!--    --><?//= $form->field($model, 'datetime')->textInput() ?>

<!--    --><?//= $form->field($model, 'datetime')->widget(DatePicker::className(),['clientOptions' => ['gotoCurrent']]) ?>

<!--    --><?//= $form->field($model, 'deleted')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Отправить' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php Pjax::end() ?>

</div>

