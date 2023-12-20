<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clicks".
 *
 * @property int $ClickID
 * @property int $ContentID
 * @property string $ContentType
 * @property int $ClickCount
 */
class Clicks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clicks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ContentID', 'ContentType'], 'required'],
            [['ContentID', 'ClickCount'], 'integer'],
            [['ContentType'], 'string'],
            [['ContentID', 'ContentType'], 'unique', 'targetAttribute' => ['ContentID', 'ContentType']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ClickID' => 'Click ID',
            'ContentID' => 'Content ID',
            'ContentType' => 'Content Type',
            'ClickCount' => 'Click Count',
        ];
    }
}
