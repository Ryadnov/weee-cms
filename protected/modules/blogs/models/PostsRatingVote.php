<?php
class PostsRatingVote extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
            return parent::model($className);
    }

    public function tableName()
    {
            return 'posts_rating_votes';
    }
        
    public function relations() {
        return array(
            'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
        );
    }
}