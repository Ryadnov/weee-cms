<?php
    $this->pageTitle = $model->title;
    $this->crumbs = array('Блоги' => '/blogs/post/index', $model->title);
?>

<h2><?php echo $model->title; ?></h2>
<div class="post-text"><?php echo $model->text_html; ?></div>
<br/>

<div class="well">
    &nbsp; <?php echo date('d.m.Y в H:i', strtotime($model->date)); ?>

    &nbsp;
    <?php if ($model->blog == 0): ?>
        в личном блоге
    <?php else: $blog = Blogs::model()->findByPk($model->blog); ?>
        в блоге <a href="/blog/<?php echo $blog->url; ?>"><?php echo $blog->title; ?></a>
    <?php endif; ?>

    <?php if ($model->author == Yii::app()->user->id || Yii::app()->user->checkAccess('root')): ?>
        &nbsp; <a href="<?php echo $this->createUrl("/blogs/post/update", array("id" => $model->id)); ?>">редактировать</a>
    <?php endif; ?>
</div>