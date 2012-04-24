<?php

class UsersModule extends WebModule
{

    public static function name()
    {
        return 'Пользователи';
    }


    public static function description()
    {
        return 'Модуль пользователей';
    }


    public function init()
    {
        parent::init();

        $this->setImport(array(
            'users.models.*',
            'users.components.*',
        ));
    }


}
