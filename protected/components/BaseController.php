<?php

class BaseController extends CController
{

    public $layout = '//layouts/main';
    public $crumbs = array();

    protected function pageNotFound()
    {
        throw new CHttpException(404, 'Страница не найдена!');
    }


    protected function forbidden()
    {
        throw new CHttpException(403, 'Запрещено!');
    }


}