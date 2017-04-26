<?php

namespace app\controllers;

use app\models\News;
use app\models\Category;
use Yii;
use yii\data\Pagination;

/**
 * CategoryController implements the CRUD actions for Category model.
 */

class CategoryController extends AppController
{
    public function actionIndex()
    {
        $news = News::find()->where(['deleted' => 0])->orderBy(['datetime'=> SORT_DESC]);
//        var_dump($latest);

        $pages = new Pagination(['totalCount' => $news->count(), 'pageSize'=> 5]);
        $latest = $news->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', compact('pages', 'latest'));
    }

    /**
     * Displays a single News model.
     * @param string $id
     * @return mixed
     */

    public function actionView($id)
    {
        $category_id = Yii::$app->request->get('id');
//        var_dump($category_id );

        $category_name = Category::find()->where(['category_id' => $category_id])->all();
        $query = News::find()->where(['category_name' => $category_name]);

        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize'=> 2]);
        $news = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('view', compact('news', 'pages'));
    }
}
