<div class="post">
    <h3>
        <?php if ($model->blog == 0): ?>
            <a href="/user/<?php echo $model->author; ?>/blog" class="blog-title">Личный блог</a>
        <?php else: ?>
            <a href="/blog/<?php echo $model->blog_model->url; ?>" class="blog-title"><?php echo $model->blog_model->title; ?></a>
        <?php endif; ?>
        → <a class="post-title" href="<?php echo $model->href; ?>"><?php echo $model->title; ?></a>
    </h3>
    
    <div class="post-text"><?php echo $model->text_short; ?> <a href="<?php echo $model->href; ?>">Читать далее</a></div>
    <div class="well">
        <?php echo date('d.m.Y в H:i', strtotime($model->date)); ?>          
        <?php if ($model->author == Yii::app()->user->id || Yii::app()->user->checkAccess('root')): ?>
            &nbsp; <a href="<?php echo $this->createUrl("/blogs/post/update", array("id" => $model->id)); ?>">редактировать</a>
        <?php endif; ?>
    </div>
</div>