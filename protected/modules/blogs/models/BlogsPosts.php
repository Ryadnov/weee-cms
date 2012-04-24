<?php

class BlogsPosts extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }


    public function tableName()
    {
        return '{{blogs_posts}}';
    }


    public function rules()
    {
        return array(
            array('title, text', 'required', 'message' => 'Не заполнено поле "{attribute}"'),
            array('date, blog, games, text', 'safe'),
        );
    }


    public function attributeLabels()
    {
        return array(
            'text' => 'Текст',
            'title' => 'Название'
        );
    }


    public function relations()
    {
        return array(
            'blog_model' => array(self::BELONGS_TO, 'Blogs', 'blog'),
            'author_model' => array(self::BELONGS_TO, 'User', 'author'),
        );
    }


    public function getHref()
    {
        return Yii::app()->controller->createUrl("/blogs/post/view", array("id" => $this->id));
    }


    public function beforeSave()
    {
        if ($this->isNewRecord)
        {
            $this->date = date('Y-m-d H:i:s');
            $this->author = Yii::app()->user->id;
        }

        if (preg_match("#<cut>#i", $this->text))
        {
            $out = explode('<cut>', $this->text);
            $this->text_html = str_replace('<cut>', '', $this->text);
            $this->text_short = $out[0];
        } else
        {
            $this->text_short = $this->text;
        }

        $text = TextHelper::purify($this->text);

        if (preg_match("#<cut/>#i", $text))
        {
            $out = explode('<cut/>', $text);
            $this->text_html = str_replace('<cut/>', '', $text);
            $this->text_short = $out[0];
        } else
        {
            $this->text_short = $text;
            $this->text_html = $text;
        }

        return true;
    }

}