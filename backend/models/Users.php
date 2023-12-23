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
 * @property Admins[] $admins
 * @property Articlecomments[] $articlecomments
 * @property Comments[] $comments
 * @property Videocomments[] $videocomments
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
     * Gets query for [[Admins]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdmins()
    {
        return $this->hasMany(Admins::class, ['Username' => 'Username']);
    }

    /**
     * Gets query for [[Articlecomments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticlecomments()
    {
        return $this->hasMany(Articlecomments::class, ['Username' => 'Username']);
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::class, ['Username' => 'Username']);
    }

    /**
     * Gets query for [[Videocomments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVideocomments()
    {
        return $this->hasMany(Videocomments::class, ['Username' => 'Username']);
    }
}
