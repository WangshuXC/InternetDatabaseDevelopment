<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articlelikes".
 *
 * @property int $LikeID
 * @property int $ArticleID
 * @property int|null $Likes
 *
 * @property Articles $article
 */
class Articlelikes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articlelikes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ArticleID'], 'required'],
            [['ArticleID', 'Likes'], 'integer'],
            [['ArticleID'], 'exist', 'skipOnError' => true, 'targetClass' => Articles::class, 'targetAttribute' => ['ArticleID' => 'ArticleID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'LikeID' => 'Like ID',
            'ArticleID' => 'Article ID',
            'Likes' => 'Likes',
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
}
