<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "news".
 *
 * @property string $news_id
 * @property string $category_name
 * @property string $header
 * @property string $content
 * @property integer $views
 * @property string $datetime
 * @property integer $deleted
 *
 * @property Comment[] $comments
 * @property Comment[] $comments0
 * @property Category $categoryName
 * @property Category $deleted0
 */
class News extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_name', 'header', 'datetime'], 'required'],
            [['content'], 'string'],
            [['views', 'deleted'], 'integer'],
            [['datetime'], 'safe'],
            [['category_name', 'header'], 'string', 'max' => 255],
            [['category_name'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_name' => 'category_name']],
            [['deleted'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['deleted' => 'deleted']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'news_id' => 'News ID',
            'category_name' => 'Category Name',
            'header' => 'Header',
            'content' => 'Content',
            'views' => 'Views',
            'datetime' => 'Datetime',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['news_id' => 'news_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments0()
    {
        return $this->hasMany(Comment::className(), ['deleted' => 'deleted']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryName()
    {
        return $this->hasOne(Category::className(), ['category_name' => 'category_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeleted0()
    {
        return $this->hasOne(Category::className(), ['deleted' => 'deleted']);
    }
}
