<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proposal".
 *
 * @property int $proposal_id
 * @property string $proposal_no
 * @property string $proposal_title
 * @property string $proposal_type
 * @property string $proposal_abstract_tr
 * @property string $proposal_abstract_en
 * @property array $proposal_body
 * @property array $proposal_team
 *
 * @property Evaluation[] $evaluations
 * @property Userproposal[] $userproposals
 */
class Proposal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proposal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['proposal_no', 'proposal_title', 'proposal_type', 'proposal_abstract_tr', 'proposal_abstract_en', 'proposal_body', 'proposal_team'], 'required'],
            [['proposal_no', 'proposal_title', 'proposal_type', 'proposal_abstract_tr', 'proposal_abstract_en'], 'string'],
            [['proposal_body', 'proposal_team'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'proposal_id' => 'Proposal ID',
            'proposal_no' => 'Proposal No',
            'proposal_title' => 'Proposal Title',
            'proposal_type' => 'Proposal Type',
            'proposal_abstract_tr' => 'Proposal Abstract Tr',
            'proposal_abstract_en' => 'Proposal Abstract En',
            'proposal_body' => 'Proposal Body',
            'proposal_team' => 'Proposal Team',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluations()
    {
        return $this->hasMany(Evaluation::className(), ['evaluation_proposal_id' => 'proposal_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserproposals()
    {
        return $this->hasMany(Userproposal::className(), ['userproposal_proposal_id' => 'proposal_id']);
    }
}
