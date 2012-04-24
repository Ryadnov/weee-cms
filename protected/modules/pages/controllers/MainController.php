<?php

class MainController extends BaseController
{

    public function actionIndex()
    {
        $this->render('index');
    }


    public function actionView($url)
    {
        $model = Page::model()->findByAttributes(array('url' => $url));

        if ($model == null)
            $this->pageNotFound();

        $this->render('view', array(
            'model' => $model,
        ));
    }


}