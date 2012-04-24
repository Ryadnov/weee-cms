<h2><?php echo $this->pageTitle; ?></h2>

<?php

$this->widget('GridView', array(
    'id' => 'blogs-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    
    'columns' => array(
        'id',
        'title',
        'url',
        array(
            'class' => 'CButtonColumn',
            'template' => '{update}',
            'updateButtonUrl' => 'Yii::app()->controller->createUrl("editBlog", array("id" => $data->id))',
        ),
    ),
));