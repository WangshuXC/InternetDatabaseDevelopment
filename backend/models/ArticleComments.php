<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articlecomments".
 *
 * @property int $CommentID
 * @property int $ArticleID
 * @property string $Comment
 * @property string|null $CommentDate
 * @property string $Username
 *
 * @property Articles $article
 * @property Users $username
 */
class Articlecomments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articlecomments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ArticleID', 'Comment', 'Username'], 'required'],
            [['ArticleID'], 'integer'],
            [['Comment'], 'string'],
            [['CommentDate'], 'safe'],
            [['Username'], 'string', 'max' => 50],
            [['ArticleID'], 'exist', 'skipOnError' => true, 'targetClass' => Articles::class, 'targetAttribute' => ['ArticleID' => 'ArticleID']],
            [['Username'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['Username' => 'Username']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CommentID' => 'Comment ID',
            'ArticleID' => 'Article ID',
            'Comment' => 'Comment',
            'CommentDate' => 'Comment Date',
            'Username' => 'Username',
        ];
    }

    /**
     * Gets query for [[Article]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Articles::class, ['ArticleID' => 'ArticleID']);
    }

    /**
     * Gets query for [[Username]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsername()
    {
        return $this->hasOne(Users::class, ['Username' => 'Username']);
    }
}
