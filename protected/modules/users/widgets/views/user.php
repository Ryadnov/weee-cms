<ul class="nav pull-right">
    <li><a><?php echo $model->email; ?></a></li>
    <li><a href="<?php echo Yii::app()->controller->createUrl('/users/main/logout'); ?>">Выход</a></li>
</ul>