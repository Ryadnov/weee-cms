<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?Php echo $this->pageTitle; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="/css/bootstrap.css" rel="stylesheet">
        <link href="/css/app.css" rel="stylesheet">
        <script src="/js/bootstrap.min.js"></script>
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="/"><?php echo Yii::app()->name; ?></a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li><a href="/">Главная</a></li>
                            <li><a href="<?php echo $this->createUrl('/pages/main/view', array('url' => 'about')); ?>">О нас</a></li>
                        </ul>
                        
                        <?php $this->widget('users.widgets.UserMenu'); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <?php $this->widget('Breadcrumbs', array(
                'links' => $this->crumbs,
            )); ?>
            <?php echo $content; ?>
            
            <hr/>
            <footer>
                <p>© Weee CMS based on Yii Framework</p>
            </footer>
        </div> 
    </body>
</html>
