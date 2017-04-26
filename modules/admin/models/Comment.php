<?php

namespace app\modules\admin\models;

use Yii;

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
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_id', 'nickname', 'text', 'datetime'], 'required'],
            [['news_id', 'deleted'], 'integer'],
            [['text'], 'string'],
            [['datetime'], 'safe'],
            [['nickname'], 'string', 'max' => 255],
            [['news_id'], 'exist', 'skipOnError' => true, 'targetClass' => News::className(), 'targetAttribute' => ['news_id' => 'news_id']],
            [['deleted'], 'exist', 'skipOnError' => true, 'targetClass' => News::className(), 'targetAttribute' => ['deleted' => 'deleted']],
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
            'nickname' => 'Nickname',
            'text' => 'Text',
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
