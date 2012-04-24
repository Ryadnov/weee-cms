<?php

class BaseController extends CController
{

    public $layout = '//layouts/column2';
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