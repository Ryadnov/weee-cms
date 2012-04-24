<h2>Список блогов</h2>

<ul>
    <?php foreach ($blogs as $blog): ?>
        <?php $this->renderPartial('_view', array(
            'model' => $blog,
        )); ?>
    <?php endforeach; ?>
</ul>
