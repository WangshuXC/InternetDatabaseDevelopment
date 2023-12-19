<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $UserID
 * @property string $Username
 * @property string $Password
 *
 * @property Articles[] $articles
 * @property Comments[] $comments
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Username', 'Password'], 'required'],
            [['Username'], 'string', 'max' => 50],
            [['Password'], 'string', 'max' => 100],
            [['Username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'UserID' => 'User ID',
            'Username' => 'Username',
            'Password' => 'Password',
        ];
    }

    /**
     * Gets query for [[Articles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Articles::class, ['AuthorID' => 'UserID']);
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::class, ['UserID' => 'UserID']);
    }
}
