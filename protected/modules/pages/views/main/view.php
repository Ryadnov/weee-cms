<?Php
    $this->crumbs = array($model->title);
    $this->layout = '//layouts/column2';
?>

<h2><?php echo $model->title; ?></h2>
<?php echo $model->text; ?>