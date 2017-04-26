<?php

use yii\widgets\LinkPager;

/* @var $this yii\web\View */
$this->title = 'News';
?>
<div class="site-index">
    <h1>Последние новости</h1>
</div>

<? foreach($latest as $news): ?>
    <a href="<?= \yii\helpers\Url::to(['news/view', 'id'=>$news['news_id']])?>">
        <h3><?= $news->header?></h3>
    </a>
    <span> Категория: <?= $news->category_name?></span>
    <span> | Просмотров: <?= $news->views?></span>
    <span> | Время: <?= $news->datetime?> </span>
<?endforeach;?>


<div class="clearfix"></div>

<?
echo LinkPager::widget([
    'pagination' => $pages,
]);
?>