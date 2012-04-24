<?php
$this->pageTitle = 'Регистрация';
$this->crumbs = array('Регистрация');
?>

<h2>Регистрация</h2>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'register-form-register-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('class' => 'well')
            ));
    ?>

        <?php if ($model->hasErrors()): ?>
                <div class="message error">
                    <?php foreach ($model->errors as $error): ?>
                        <p class="errornote"><?php echo $error[0]; ?></p>
                <?php endforeach; ?>
                </div>
        <?php endif; ?>


        <label>E-mail:</label>
        <input name="User[email]" value="<?php echo $model->email; ?>">


        <label>Пароль:</label>
        <input name="User[password]" type="password">

        <label>Повтор пароля:</label>
         <input name="User[password2]" type="password">

        <br/><input type="submit" class="btn" value="Регистрация">


<?php $this->endWidget(); ?>

