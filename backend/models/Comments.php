<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $CommentID
 * @property int $VideoID
 * @property string $Comment
 * @property string|null $CommentDate
 * @property string $Username
 *
 * @property Users $username
 * @property Videos $video
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['VideoID', 'Comment', 'Username'], 'required'],
            [['VideoID'], 'integer'],
            [['Comment'], 'string'],
            [['CommentDate'], 'safe'],
            [['Username'], 'string', 'max' => 50],
            [['VideoID'], 'exist', 'skipOnError' => true, 'targetClass' => Videos::class, 'targetAttribute' => ['VideoID' => 'VideoID']],
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
            'VideoID' => 'Video ID',
            'Comment' => 'Comment',
            'CommentDate' => 'Comment Date',
            'Username' => 'Username',
        ];
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

    /**
     * Gets query for [[Video]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVideo()
    {
        return $this->hasOne(Videos::class, ['VideoID' => 'VideoID']);
    }
}
