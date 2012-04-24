<?php

class PostController extends BaseController
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
                'actions' => array('create', 'update', 'addcomment', 'gameslist', 'rate'),
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
        $criteria = new CDbCriteria();
        $criteria->order = "id DESC";

        $count = BlogsPosts::model()->count($criteria);

        $pages = new CPagination($count);
        $pages->pageSize = 10;
        $pages->applyLimit($criteria);

        $models = BlogsPosts::model()->findAll($criteria);

        $this->render('index', array(
            'models' => $models,
            'pages' => $pages
        ));
    }


    public function actionView($id)
    {
        $model = BlogsPosts::model()->findByPk($id);

        if ($model == null)
            $this->pageNotFound();

        $this->render('view', array(
            'model' => $model,
        ));
    }


    public function actionCreate()
    {
        $model = new BlogsPosts;
        $blogs = Blogs::getAllowedBlogs(Yii::app()->user->id);
        $is_preview = false;

        if (isset($_POST['add']))
        {
            $model->attributes = $_POST['Post'];

            if ($model->save())
            {
                $this->redirect($model->href);
            }
        }

        if (isset($_POST['preview']))
        {
            $model->attributes = $_POST['Post'];

            if ($model->validate())
            {
                $is_preview = true;
            }
        }

        $this->render('create', array(
            'model' => $model,
            'blogs' => $blogs,
            'is_preview' => $is_preview,
        ));
    }


    public function actionUpdate($id)
    {
        $model = BlogsPosts::model()->findByPk($id);

        if ($model == null)
            $this->pageNotFound();

        if (!($model->author == Yii::app()->user->id || Yii::app()->user->checkAccess('root')))
            $this->forbidden();

        $blogs = Blogs::getAllowedBlogs(Yii::app()->user->id);

        if (isset($_POST['Post']))
        {
            $model->attributes = $_POST['Post'];

            if ($model->save())
            {
                $this->redirect($model->href);
            }
        }

        $this->render('update', array(
            'model' => $model,
            'blogs' => $blogs,
        ));
    }


}