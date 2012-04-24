<?php

class BlogsModule extends WebModule
{

    public static function description()
    {
        return 'Модуль блогов';
    }


    public static function name()
    {
        return 'Блоги';
    }


    public function init()
    {
        $this->setImport(array(
            'blogs.models.*',
            'blogs.components.*',
            'users.models.*'
        ));
    }


}
