<?php
    $this->pageTitle = 'Авторизация';
    $this->crumbs = array('Авторизация');
?>

<h2>Авторизация</h2>
<form method="post" class="well">
    <label>E-mail:</label>
    <input name="LoginForm[username]">

    <label>Пароль:</label>
    <input name="LoginForm[password]" type="password"> <br/>

    <input type="submit" value="Войти" class="btn">
</form>
