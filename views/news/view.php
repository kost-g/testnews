<?
use app\models\Comment;
use yii\widgets\LinkPager;

//    var_dump($post);
?>

    <h3> Категория: <?= $post->category_name?> </h3>
    <span> Время: <?= $post->datetime?> </span>

    <h3><?= $post->header?></h3>
    <p><?= $post->content?></p>
    <span > Просмотров: <?= $post->views?></span>

    <h4>Комментарии</h4>

    <div class="comment-create">

        <div class="news-create">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>

    <?
//        var_dump($comments);

    foreach ($comments as $comment):?>
        <h5><?= $comment->nickname?> : <?= $comment->datetime?> </h5>
        <strong><?= $comment->text?></strong>
    <? endforeach;?>

        <div class="clearfix"></div>

     <?
        echo LinkPager::widget([
         'pagination' => $pages,
     ]);
    ?>
