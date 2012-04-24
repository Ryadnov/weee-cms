<?php
$form = array(
    'activeForm' => array(
        'id' => 'settings-form',
        'class' => 'CActiveForm',
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ),
    'elements' => array(
        'name' => array(
            'type' => 'text'
        ),
        'surname' => array(
            'type' => 'text'
        ),
        'is_subscribe' => array(
            'type' => 'dropdownlist',
            'items' => array(0 => 'Нет', 1 => 'Да')
        ),
        '<label>Текущий аватар</label> <img src="' . $this->model->photo . '" style="width:80px; height: 80px; border:#eeeeee 5px solid;">',
        'image' => array('type' => 'file'),
    ),
    'buttons' => array(
        'submit' => array(
            'type' => 'submit',
            'value' => 'Сохранить',
            'class' => 'button',
        ),
    )
);

if (Yii::app()->user->model->nickname == '')
    $form['elements']['nickname'] = array('type' => 'text');

return $form;