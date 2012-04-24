<?php

class PagesModule extends WebModule
{

    public static function name()
    {
        return 'Видео';
    }


    public static function description()
    {
        return 'Модуль статических страниц';
    }


    public function init()
    {
        $this->setImport(array(
            'pages.models.*',
        ));
    }


}
