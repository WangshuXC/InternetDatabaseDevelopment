<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "videos".
 *
 * @property int $VideoID
 * @property string $Title
 * @property string|null $Description
 * @property string $VideoURL
 * @property string|null $UploadDate
 *
 * @property Comments[] $comments
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
            [['Title', 'VideoURL'], 'required'],
            [['Description'], 'string'],
            [['UploadDate'], 'safe'],
            [['Title'], 'string', 'max' => 100],
            [['VideoURL'], 'string', 'max' => 255],
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
            'VideoURL' => 'Video Url',
            'UploadDate' => 'Upload Date',
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
}
