<?php

return array(
    'elements' => array(
        'title' => array('type' => 'text'),
        'url' => array('type' => 'text'),
    ),
    'buttons' => array(
        'submit' => array(
            'type' => 'submit',
            'value' => $this->model->isNewRecord ? 'Создать' : 'Сохранить'
        ),
    )
);
