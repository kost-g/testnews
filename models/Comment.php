<?php

namespace app\models;

use yii\base\Model;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


/**
 * This is the model class for table "comment".
 *
 * @property string $comment_id
 * @property string $news_id
 * @property string $nickname
 * @property string $text
 * @property string $datetime
 * @property integer $deleted
 *
 * @property News $news
 * @property News $deleted0
 */
class Comment extends \yii\db\ActiveRecord
{
    //Getting current time

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'datetime',
                'updatedAtAttribute' => false,
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     * Validation rules
     */
    public function rules()
    {
        return [
            [['nickname', 'text'], 'required'],
            [['text'], 'string'],
            [['nickname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'comment_id' => 'Comment ID',
            'news_id' => 'News ID',
            'nickname' => 'Ваше имя',
            'text' => 'Введите комментарий',
            'datetime' => 'Datetime',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasOne(News::className(), ['news_id' => 'news_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeleted0()
    {
        return $this->hasOne(News::className(), ['deleted' => 'deleted']);
    }
}
