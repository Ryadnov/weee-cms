<?php

class RegisterForm extends CFormModel {

    public $password;
    public $password2;
    public $email;

    public function rules() {
        return array(
            array('password, password2, email', 'required'),
            array('email', 'uniqueEmail'),
            array('email', 'email'),
            array('password', 'equalityPassword')
        );
    }

    public function attributeLabels() {
        return array(
            'name' => 'Имя',
            'password' => 'Пароль',
            'password2' => 'Повтор пароля',
            'email' => 'E-mail',
        );
    }

    public function uniqueEmail() {
        if (User::model()->exists('email=:email', array(':email' => $this->email)))
            $this->addError('email', 'Этот e-mail уже используется');
    }
    
    public function equalityPassword() {
        if ($this->password != $this->password2)
            $this->addError ('password', 'Пароли не совпадают');
    }

}
