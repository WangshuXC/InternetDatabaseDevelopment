<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "videolikes".
 *
 * @property int $LikeID
 * @property int $VideoID
 * @property int|null $Likes
 *
 * @property Videos $video
 */
class Videolikes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'videolikes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['VideoID'], 'required'],
            [['VideoID', 'Likes'], 'integer'],
            [['VideoID'], 'exist', 'skipOnError' => true, 'targetClass' => Videos::class, 'targetAttribute' => ['VideoID' => 'VideoID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'LikeID' => 'Like ID',
            'VideoID' => 'Video ID',
            'Likes' => 'Likes',
        ];
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
