<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "evaluation_template".
 *
 * @property int $evaluation_template_id
 * @property string $evaluation_template_name
 * @property string $evaluation_template_note
 * @property array $evaluation_template_criteria
 *
 * @property Evaluation[] $evaluations
 */
class Evaluationtemplate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'evaluation_template';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['evaluation_template_name', 'evaluation_template_note', 'evaluation_template_criteria'], 'required'],
            [['evaluation_template_name', 'evaluation_template_note'], 'string'],
            [['evaluation_template_criteria'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'evaluation_template_id' => 'Evaluation Template ID',
            'evaluation_template_name' => 'Evaluation Template Name',
            'evaluation_template_note' => 'Evaluation Template Note',
            'evaluation_template_criteria' => 'Evaluation Template Criteria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluations()
    {
        return $this->hasMany(Evaluation::className(), ['evaluation_evaluation_template_id' => 'evaluation_template_id']);
    }
}
