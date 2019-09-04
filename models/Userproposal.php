<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userproposal".
 *
 * @property int $userproposal_id
 * @property int $userproposal_user_id
 * @property int $userproposal_proposal_id
 * @property string $userproposal_acceptance_status
 * @property array $userproposal_available_time
 * @property string $userproposal_step
 *
 * @property User $userproposalUser
 * @property Proposal $userproposalProposal
 */
class Userproposal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'userproposal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userproposal_user_id', 'userproposal_proposal_id', 'userproposal_acceptance_status', 'userproposal_available_time', 'userproposal_step'], 'required'],
            [['userproposal_user_id', 'userproposal_proposal_id'], 'integer'],
            [['userproposal_acceptance_status', 'userproposal_step'], 'string'],
            [['userproposal_available_time'], 'safe'],
            [['userproposal_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userproposal_user_id' => 'user_id']],
            [['userproposal_proposal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Proposal::className(), 'targetAttribute' => ['userproposal_proposal_id' => 'proposal_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'userproposal_id' => 'Userproposal ID',
            'userproposal_user_id' => 'Userproposal User ID',
            'userproposal_proposal_id' => 'Userproposal Proposal ID',
            'userproposal_acceptance_status' => 'Userproposal Acceptance Status',
            'userproposal_available_time' => 'Userproposal Available Time',
            'userproposal_step' => 'Userproposal Step',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserproposalUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'userproposal_user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserproposalProposal()
    {
        return $this->hasOne(Proposal::className(), ['proposal_id' => 'userproposal_proposal_id']);
    }
}
