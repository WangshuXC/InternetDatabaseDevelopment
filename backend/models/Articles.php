<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articles".
 *
 * @property int $ArticleID
 * @property string $Title
 * @property string|null $Content
 * @property int $AuthorID
 * @property string|null $PublicationDate
 *
 * @property Users $author
 */
class Articles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Title', 'AuthorID'], 'required'],
            [['Content'], 'string'],
            [['AuthorID'], 'integer'],
            [['PublicationDate'], 'safe'],
            [['Title'], 'string', 'max' => 255],
            [['AuthorID'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['AuthorID' => 'UserID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ArticleID' => 'Article ID',
            'Title' => 'Title',
            'Content' => 'Content',
            'AuthorID' => 'Author ID',
            'PublicationDate' => 'Publication Date',
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Users::class, ['UserID' => 'AuthorID']);
    }
}
