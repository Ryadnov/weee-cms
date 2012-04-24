<?php

class Blogs extends ActiveRecord
{

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return '{{blogs}}';
    }

    public function rules()
    {
        return array(
            array('title, url', 'required', 'message' => 'Не заполнено поле "{attribute}"'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'title' => 'Название',
            'url' => 'Адрес',
        );
    }

    public function beforeSave()
    {
        if ($this->isNewRecord)
        {
            $this->author = Yii::app()->user->id;
        }

        return true;
    }

    public function search()
    {
        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria
                ));
    }
    
    public function getHref() {
        return Yii::app()->controller->createUrl("/blogs/blog/view", array("url" => $this->url));
    }
    
    public static function getAllowedBlogs($user_id) {
        return self::model()->findAllBySql("SELECT * FROM {{blogs}} WHERE is_open = 1 OR id IN(SELECT blog_id FROM {{blogs_can_write}} WHERE user_id = {$user_id})");
    }

}