<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            $saltypassword=hash('sha512',$this->password.Yii::$app->params['salt']);
            if (!$user || !$user->validatePassword($saltypassword)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            echo "BURADA-->".print_r($this->getUser())."----".print_r(Yii::$app->user);

            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {

//echo print_r($this);
//echo print_r($this->password);


$saltypassword=hash('sha512',$this->password.Yii::$app->params['salt']);
echo "[".$saltypassword."]";
//Yii::$app->end();
        if ($this->_user === false) {
            $this->_user =  User::find()->where(['user_email' => $this->username])->one();

//User::findByUseremail($this->username);
/*
            $this->_user=
            $test_user=new User();
            $test_user->id="100";
            $test_user->username="egemen";
*/
            
        }

        return $this->_user;
    }
}
