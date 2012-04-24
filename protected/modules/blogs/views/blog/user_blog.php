<?php if ($models != null): ?>
    <?php foreach ($models as $model): ?>
        <?php $this->renderPartial('_blog_view', array('model' => $model)); ?>
    <?php endforeach; ?>
<?php else: ?>
    <div class="message warning">Нет записей</div>
<?php endif; ?>