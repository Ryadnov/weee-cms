<?php if ($is_preview == true): ?>
<br/>
<h3>Предпросмотр:</h3>
<hr/>
<div class="post-preview">     
    <h2><?php echo $model->title; ?> <?php if ($model->author == Yii::app()->user->id || Yii::app()->user->checkAccess('root')): ?><a href="/post/edit/<?php echo $model->id; ?>"><img src="/images/edit.png"></a><?php endif; ?></h2>
    <div class="post-text"><?php echo TextHelper::purify($model->text); ?></div>
    <br/>

    <div class="well">
        &nbsp;
        <?php if ($model->blog == 0): ?>
            в личном блоге
        <?php else: $blog = Blogs::model()->findByPk($model->blog); ?>
            в блоге <a href="<?php echo $blog->href; ?>"><?php echo $blog->title; ?></a>
        <?php endif; ?>
    </div>
</div>
<br/>
<?php endif; ?>

<?php if ($model->hasErrors()): ?>
    <div class="alert alert-error">
        <?php foreach ($model->errors as $error): ?>
            - <?php echo $error[0]; ?><br/>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form method="post" class="well">
        <label>Название</label>
        <input type="text" name="Post[title]" value="<?php echo $model->title; ?>">

        <label>Блог</label>
        <select name="Post[blog]">
            <option value="0">Личный блог</option>
            <?php foreach ($blogs as $blog): ?>
                <option value="<?php echo $blog->id; ?>" <?php if ($blog->id == $model->blog) echo 'selected'; ?>><?php echo $blog->title; ?></option>
            <?php endforeach; ?>
        </select>
    
        <label>Текст</label>
        <textarea name="Post[text]" style="width: 725px;  height: 220px;"><?php echo $model->text; ?></textarea> <br/>


        <input type="submit" name="add" value="Сохранить" class="btn btn-primary">
        <?php if ($model->isNewRecord): ?>
            <input type="submit" name="preview" value="Предпросмотр" class="btn">
        <?php endif; ?>
</form>