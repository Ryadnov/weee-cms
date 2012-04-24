<?php
    $this->pageTitle = 'Блоги';
    $this->crumbs = array('Блоги');
?>

<?php foreach ($models as $model): ?>
    <?php $this->renderPartial('_index_view', array('model' => $model)); ?>
<?php endforeach; ?>

<?php $this->renderPartial('//layouts/_pagination', array('pages' => $pages)); ?>