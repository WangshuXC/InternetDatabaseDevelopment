<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "webviews".
 *
 * @property int $Views
 */
class Webviews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'webviews';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Views'], 'required'],
            [['Views'], 'integer'],
            [['Views'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Views' => 'Views',
        ];
    }
}
