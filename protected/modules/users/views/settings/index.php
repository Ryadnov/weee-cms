<h2>Настройки</h2>
<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="message">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>

<?php 
    $this->pageTitle = 'Настройки';
    echo $form; 
?>