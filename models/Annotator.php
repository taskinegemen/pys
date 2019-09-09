<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "annotator".
 *
 * @property int $annotator_item_id
 * @property int $annotator_page_id
 * @property array $annotator_body
 * @property int $annotator_user_user_id
 *
 * @property User $annotatorUserUser
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
            [['annotator_page_id', 'annotator_body', 'annotator_user_user_id'], 'required'],
            [['annotator_page_id', 'annotator_user_user_id'], 'integer'],
            [['annotator_body'], 'safe'],
            [['annotator_user_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['annotator_user_user_id' => 'user_id']],
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
            'annotator_user_user_id' => 'Annotator User User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnnotatorUserUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'annotator_user_user_id']);
    }
}
