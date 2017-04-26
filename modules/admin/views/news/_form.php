<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\models\Category;
use yii\jui\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_name')->dropdownList(Category::find()->select(['category_name'])->indexBy('category_id')->column(),
        ['prompt'=>'Select Category']);?>

    <?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'views')->textInput() ?>

    <?= $form->field($model, 'datetime')->textInput() ?>

<!--    --><?//= $form->field($model, 'datetime')->widget(DatePicker::className(),['clientOptions' => ['dateFormat:'=> 'yy-mm-dd HH:MM:SS', 'gotoCurrent' =>true]])?>

    <?= $form->field($model, 'deleted')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
