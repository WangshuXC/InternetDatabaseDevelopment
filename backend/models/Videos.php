<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "videos".
 *
 * @property int $VideoID
 * @property string $Title
 * @property string|null $Description
 * @property string $PictureURL
 * @property string $UploadDate
 * @property string $VideoURL
 *
 * @property Comments[] $comments
 * @property Videocomments[] $videocomments
 * @property Videolikes[] $videolikes
 */
class Videos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'videos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Title', 'PictureURL', 'UploadDate', 'VideoURL'], 'required'],
            [['Description'], 'string'],
            [['Title'], 'string', 'max' => 100],
            [['PictureURL', 'UploadDate', 'VideoURL'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'VideoID' => 'Video ID',
            'Title' => 'Title',
            'Description' => 'Description',
            'PictureURL' => 'Picture Url',
            'UploadDate' => 'Upload Date',
            'VideoURL' => 'Video Url',
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::class, ['VideoID' => 'VideoID']);
    }

    /**
     * Gets query for [[Videocomments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVideocomments()
    {
        return $this->hasMany(Videocomments::class, ['VideoID' => 'VideoID']);
    }

    /**
     * Gets query for [[Videolikes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVideolikes()
    {
        return $this->hasMany(Videolikes::class, ['VideoID' => 'VideoID']);
    }
}
