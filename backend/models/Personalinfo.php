<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personalinfo".
 *
 * @property string $Name
 * @property string|null $Info
 * @property string|null $AvatarURL
 * @property string|null $Email
 * @property string|null $GitHubAccount
 * @property string|null $WeChatID
 */
class Personalinfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'personalinfo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name'], 'required'],
            [['Info'], 'string'],
            [['Name', 'Email', 'GitHubAccount', 'WeChatID'], 'string', 'max' => 100],
            [['AvatarURL'], 'string', 'max' => 255],
            [['Name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Name' => 'Name',
            'Info' => 'Info',
            'AvatarURL' => 'Avatar Url',
            'Email' => 'Email',
            'GitHubAccount' => 'Git Hub Account',
            'WeChatID' => 'We Chat ID',
        ];
    }
}
