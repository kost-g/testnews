<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\models\Category;
use yii\jui\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<?
    $date = new DateTime();
    $datetime = $date->format('Y-m-d H:i:s');
    $category_list = Category::find()->select(['category_name'])->indexBy('category_id')->column();
    var_dump($category_list);

?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_name')->dropdownList(['0' => 'Активен', '1'=> 'Не Актиен']);?>

<!--        --><?//= $form->field($model, 'category_name')->textInput() ?>

<!--    $form->field($model, 'product_category')->dropdownList(ProductCategory::find()->select(['category_name', 'id'])->indexBy('id')->column(),-->
<!--    ['prompt'=>'Select Category']-->

    <?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'views')->textInput(['value' => 0]) ?>

    <?= $form->field($model, 'datetime')->textInput(['value' => $datetime]) ?>

<!--    --><?//= $form->field($model, 'datetime')->widget(DatePicker::className(),['clientOptions' => ['dateFormat:'=> 'yy-mm-dd HH:MM:SS', 'gotoCurrent' =>true]])?>

    <?= $form->field($model, 'deleted')->dropdownList(['0' => 'Активен', '1'=> 'Не Актиен']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
