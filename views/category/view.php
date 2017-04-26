<?php

/* @var $this yii\web\View */

use yii\widgets\LinkPager;

$this->title = 'News';
?>

<? foreach($news as $article): ?>
<!--        --><?//= var_dump($news); ?>
    <a href="<?= \yii\helpers\Url::to(['news/view', 'id'=>$article['news_id']])?>">
        <h3><?= $article->header?></h3>
    </a>
    <span> Просмотров: <?= $article->views?></span>
    <span> | Время: <?= $article->datetime?> </span>
<?endforeach;?>

    <div class="clearfix"></div>

<?
echo LinkPager::widget([
    'pagination' => $pages,
]);
?>