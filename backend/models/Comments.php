<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $CommentID
 * @property int $UserID
 * @property int $VideoID
 * @property string $Comment
 * @property string|null $CommentDate
 *
 * @property Users $user
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
            [['UserID', 'VideoID', 'Comment'], 'required'],
            [['UserID', 'VideoID'], 'integer'],
            [['Comment'], 'string'],
            [['CommentDate'], 'safe'],
            [['UserID'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['UserID' => 'UserID']],
            [['VideoID'], 'exist', 'skipOnError' => true, 'targetClass' => Videos::class, 'targetAttribute' => ['VideoID' => 'VideoID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CommentID' => 'Comment ID',
            'UserID' => 'User ID',
            'VideoID' => 'Video ID',
            'Comment' => 'Comment',
            'CommentDate' => 'Comment Date',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class, ['UserID' => 'UserID']);
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
