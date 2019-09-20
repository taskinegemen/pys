<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "conversation_user".
 *
 * @property int $conversation_user_id
 * @property int $conversation_user_conversation_id
 * @property int $conversation_user_user_id
 *
 * @property User $conversationUserUser
 * @property Conversation $conversationUserConversation
 */
class Conversationuser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'conversation_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['conversation_user_conversation_id', 'conversation_user_user_id'], 'required'],
            [['conversation_user_conversation_id', 'conversation_user_user_id'], 'integer'],
            [['conversation_user_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['conversation_user_user_id' => 'user_id']],
            [['conversation_user_conversation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Conversation::className(), 'targetAttribute' => ['conversation_user_conversation_id' => 'conversation_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'conversation_user_id' => 'Conversation User ID',
            'conversation_user_conversation_id' => 'Conversation User Conversation ID',
            'conversation_user_user_id' => 'Conversation User User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConversationUserUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'conversation_user_user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConversationUserConversation()
    {
        return $this->hasOne(Conversation::className(), ['conversation_id' => 'conversation_user_conversation_id']);
    }
}
