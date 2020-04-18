<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * SignupForm is the model behind the contact form.
 */
class SignupForm extends Model
{
    public $username;
    // public $email;
    public $password;
    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['username', /*'email',*/ 'password'], 'required'],
            // ['email', 'email'],
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'username' => 'User Name',
            // 'email' => 'E-Mail',
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
     public function signup()
     {
       $user = new User();
       if ($this->validate()) {
           $user->username = $this->username;
           // $user->email = $this->email;
           $user->setPassword($this->password);
           // $user->generateAuthKey(); // this is done in User->beforeSave()
           $user->save(false);

           // the following three lines were added:
           // $auth = \Yii::$app->authManager;
           // $authorRole = $auth->getRole('author');
           // $auth->assign($authorRole, $user->getId());

           return $user;
       }/* else {
         var_dump($user);
         die('');
       }*/
       return null;
     }

}
