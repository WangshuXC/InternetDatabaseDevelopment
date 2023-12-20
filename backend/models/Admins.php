<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admins".
 *
 * @property int $AdminID
 * @property string $Username
 * @property string $Password
 */
class Admins extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admins';
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
            'AdminID' => 'Admin ID',
            'Username' => 'Username',
            'Password' => 'Password',
        ];
    }
}
