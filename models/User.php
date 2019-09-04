<?php

namespace app\models;
use yii\web\IdentityInterface;
use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $user_id
 * @property string $user_name
 * @property string $user_surname
 * @property string $user_email
 * @property string $user_iban
 * @property string $user_instution
 * @property string $user_mobile
 * @property string $user_yok_researcher_id
 *
 * @property Evaluation[] $evaluations
 * @property ManagedBy[] $managedBies
 * @property Userproposal[] $userproposals
 * @property Userrole[] $userroles
 */
class User extends \yii\db\ActiveRecord  implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_name', 'user_surname', 'user_email', 'user_password', 'user_iban', 'user_instution', 'user_mobile'], 'required'],
            [['user_name', 'user_surname', 'user_email', 'user_password', 'user_iban', 'user_instution', 'user_mobile', 'user_yok_researcher_id'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_name' => 'User Name',
            'user_surname' => 'User Surname',
            'user_email' => 'User Email',
            'user_password' => 'User Password',
            'user_iban' => 'User Iban',
            'user_instution' => 'User Instution',
            'user_mobile' => 'User Mobile',
            'user_yok_researcher_id' => 'User Yok Researcher ID',
        ];
    }


    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

   /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->user_id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->user_password;
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validatePassword($authKey)
    {
//echo print_r($this->getAuthKey(),$authKey);
        return $this->getAuthKey() === $authKey;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluations()
    {
        return $this->hasMany(Evaluation::className(), ['evaluation_managed_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManagedBies()
    {
        return $this->hasMany(ManagedBy::className(), ['managed_by_user_user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserproposals()
    {
        return $this->hasMany(Userproposal::className(), ['userproposal_user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserroles()
    {
        return $this->hasMany(Userrole::className(), ['userrole_user_user_id' => 'user_id']);
    }
}
