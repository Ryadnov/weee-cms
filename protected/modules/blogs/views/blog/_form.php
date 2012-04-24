<?php if ($model->hasErrors()): ?>
    <div class="alert alert-error">
        <?php foreach ($model->errors as $error): ?>
            - <?php echo $error[0]; ?><br/>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form method="post" class="well">
    <label>Название</label>
    <input type="text" name="Blog[title]" value="<?php echo $model->title; ?>">

    <label>Адрес</label>
    <input type="text" name="Blog[url]" value="<?php echo $model->url; ?>"> <br/>
    
    Открытый? <input type="checkbox" title="Может писать любой желающий" name="Blog[is_open]" <?php if ($model->is_open == 1) echo 'checked'; ?>><br/><br/>
    
    <input type="submit" value="Сохранить" class="btn">
</form>