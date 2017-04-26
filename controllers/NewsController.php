<?php

namespace app\controllers;

use app\models\Comment;
use Yii;
use app\models\News;
use yii\db\ActiveRecord;
use yii\data\Pagination;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends AppController
{
    public function actionView($id)
    {
        //Views counter
        $post = News::findOne($id);
        $post->updateCounters(['views' => 1]);

//        var_dump($news );

        $model = new Comment();
        $model-> deleted = 0;
        $model-> news_id = $id;

        $query = Comment::find()->where(['news_id' => $id])->orderBy(['datetime'=> SORT_DESC]);

        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize'=> 3]);
        $comments = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if($model->validate()){
                Yii::$app->session->setFlash('success','Ваш комментарий принят');
            }else{
                Yii::$app->session->setFlash('error','Ошибка');
            }
            return $this->redirect(['view' , 'id' => $model->news_id]);
        } else {
            return $this->render('view', compact('post', 'model', 'comments', 'pages'));
        }
    }
}
