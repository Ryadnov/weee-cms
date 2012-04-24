<?php

class BlogsCanWrite extends CActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return '{{blogs_can_write}}';
    }
    
}