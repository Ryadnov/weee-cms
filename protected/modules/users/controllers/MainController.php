<?php

class MainController extends BaseController
{

    public function actionLogin()
    {
        if (!Yii::app()->user->isGuest)
            $this->redirect('/');

        $model = new LoginForm;

        if (isset($_POST['LoginForm']))
        {
            $model->attributes = $_POST['LoginForm'];
            if ($model->validate() && $model->login())
                $this->redirect('/');
        }
        $this->render('login', array('model' => $model));
    }


    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect('/');
    }


    public function actionRegister()
    {

        $model = new RegisterForm;
        if (isset($_POST['User']))
        {

            $model->attributes = $_POST['User'];

            if ($model->validate())
            {
                $user = new User();
                $user->email = $_POST['User']['email'];
                $user->password = User::hashPassword($_POST['User']['password']);
                $user->save();

                $identity = new UserIdentity($model->email, $model->password);
                $identity->errorCode = 0;
                $identity->authenticate();
                Yii::app()->user->login($identity, 3600 * 24 * 30);

                $this->redirect('/');
            }
        }

        $this->render('register', array(
            'model' => $model,
        ));
    }


}