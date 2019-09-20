<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "conversation".
 *
 * @property int $conversation_id
 * @property int $conversation_user_id
 * @property int $conversation_proposal_id
 * @property string $conversation_message
 * @property array $conversation_status
 * @property string $conversation_timestamp
 *
 * @property User $conversationUser
 * @property Proposal $conversationProposal
 * @property ConversationUser[] $conversationUsers
 */
class Conversation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'conversation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['conversation_user_id', 'conversation_proposal_id', 'conversation_message', 'conversation_status'], 'required'],
            [['conversation_user_id', 'conversation_proposal_id'], 'integer'],
            [['conversation_message'], 'string'],
            [['conversation_status', 'conversation_timestamp'], 'safe'],
            [['conversation_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['conversation_user_id' => 'user_id']],
            [['conversation_proposal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Proposal::className(), 'targetAttribute' => ['conversation_proposal_id' => 'proposal_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'conversation_id' => 'Conversation ID',
            'conversation_user_id' => 'Conversation User ID',
            'conversation_proposal_id' => 'Conversation Proposal ID',
            'conversation_message' => 'Conversation Message',
            'conversation_status' => 'Conversation Status',
            'conversation_timestamp' => 'Conversation Timestamp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConversationUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'conversation_user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConversationProposal()
    {
        return $this->hasOne(Proposal::className(), ['proposal_id' => 'conversation_proposal_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConversationUsers()
    {
        return $this->hasMany(ConversationUser::className(), ['conversation_user_conversation_id' => 'conversation_id']);
    }
}
