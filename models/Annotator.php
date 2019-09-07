<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "annotator".
 *
 * @property int $annotator_item_id
 * @property int $annotator_page_id
 * @property array $annotator_body
 */
class Annotator extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'annotator';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['annotator_page_id', 'annotator_body'], 'required'],
            [['annotator_page_id'], 'integer'],
            [['annotator_body'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'annotator_item_id' => 'Annotator Item ID',
            'annotator_page_id' => 'Annotator Page ID',
            'annotator_body' => 'Annotator Body',
        ];
    }
}
