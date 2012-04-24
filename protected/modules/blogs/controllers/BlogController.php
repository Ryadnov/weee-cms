<?php

class BlogController extends BaseController
{

    public $layout = '//layouts/column2';

    public function filters()
    {
        return array(
            'accessControl',
        );
    }


    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('create'),
                'users' => array('@'),
            ),
            array('allow',
                'actions' => array('view', 'index'),
                'users' => array('*'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }


    public function actionIndex()
    {
        $this->pageTitle = 'Список блогов';
        $this->render('index', array(
            'blogs' => Blogs::model()->findAll(),
        ));
    }


    public function actionCreate()
    {
        $this->pageTitle = 'Новый блог / Блоги';

        $model = new Blogs;

        if (isset($_POST['Blog']))
        {

            $model->attributes = $_POST['Blog'];
            $model->is_open = isset($_POST['Blog']['is_open']) ? 1 : 0;

            if ($model->validate())
            {
                $model->author = Yii::app()->user->id;
                $model->save();

                $access = new BlogsCanWrite;
                $access->user_id = Yii::app()->user->id;
                $access->blog_id = $model->id;
                $access->save();

                $this->redirect($model->href);
            }
        }

        $this->render('add_blog', array(
            'model' => $model,
        ));
    }


    public function actionView($url)
    {
        $blog = Blogs::model()->find("url = '{$url}'");

        if ($blog == null)
            throw new CHttpException(404, 'Блог не существует');

        $this->pageTitle = "Блоги / Finle.ru";

        $criteria = new CDbCriteria();
        $criteria->order = "id DESC";
        $criteria->condition = "blog = {$blog->id}";

        $count = BlogsPosts::model()->count($criteria);

        $pages = new CPagination($count);
        $pages->pageSize = 15;
        $pages->applyLimit($criteria);

        $models = BlogsPosts::model()->findAll($criteria);

        $this->render('view', array(
            'blog' => $blog,
            'models' => $models,
            'pages' => $pages
        ));
    }


}