<?php if ($models != null): ?>
    <?php foreach ($models as $model): ?>
        <?php $this->renderPartial('_blog_view', array('model' => $model)); ?>
    <?php endforeach; ?>
<?php else: ?>
    <br/> <div class="alert alert-info">Ой, а тут записей еще нет, честно :(</div> <br/>
<?php endif; ?>
