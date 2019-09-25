<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "evaluation".
 *
 * @property int $evaluation_id
 * @property string $evaluation_name
 * @property string $evaluation_definite_time
 * @property int $evaluation_evaluation_template_id
 * @property int $evaluation_managed_by
 * @property string $evaluation_creation_time
 * @property string $evaluation_end_time
 * @property int $evaluation_proposal_id
 *
 * @property Evaluationtemplate $evaluationEvaluationtemplate
 * @property User $evaluationManagedBy
 * @property Proposal $evaluationProposal
 */
class Evaluation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'evaluation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['evaluation_name', 'evaluation_evaluation_template_id', 'evaluation_managed_by', 'evaluation_end_time', 'evaluation_proposal_id'], 'required'],
            [['evaluation_name'], 'string'],
            [['evaluation_definite_time', 'evaluation_creation_time', 'evaluation_end_time'], 'safe'],
            [['evaluation_evaluation_template_id', 'evaluation_managed_by', 'evaluation_proposal_id'], 'integer'],
            [['evaluation_evaluation_template_id'], 'exist', 'skipOnError' => true, 'targetClass' => Evaluationtemplate::className(), 'targetAttribute' => ['evaluation_evaluation_template_id' => 'evaluation_template_id']],
            [['evaluation_managed_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['evaluation_managed_by' => 'user_id']],
            [['evaluation_proposal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Proposal::className(), 'targetAttribute' => ['evaluation_proposal_id' => 'proposal_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'evaluation_id' => 'Evaluation ID',
            'evaluation_name' => 'Evaluation Name',
            'evaluation_definite_time' => 'Evaluation Definite Time',
            'evaluation_evaluation_template_id' => 'Evaluation Evaluation Template ID',
            'evaluation_managed_by' => 'Evaluation Managed By',
            'evaluation_creation_time' => 'Evaluation Creation Time',
            'evaluation_end_time' => 'Evaluation End Time',
            'evaluation_proposal_id' => 'Evaluation Proposal ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluationEvaluationtemplate()
    {
        return $this->hasOne(Evaluationtemplate::className(), ['evaluation_template_id' => 'evaluation_evaluation_template_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluationManagedBy()
    {
        return $this->hasOne(User::className(), ['user_id' => 'evaluation_managed_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluationProposal()
    {
        return $this->hasOne(Proposal::className(), ['proposal_id' => 'evaluation_proposal_id']);
    }
}
