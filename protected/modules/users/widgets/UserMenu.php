<?php
class UserMenu extends CWidget {
    public function run() {
        if (Yii::app()->user->isGuest) {
            $this->render('guest');
        }
        else {
            Yii::import('users.models.*');
            $this->render('user', array(
                'model' => User::model()->findByPk(Yii::app()->user->id),
            ));
        }
    }
}