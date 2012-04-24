<?php
Yii::import('zii.widgets.CBreadcrumbs');
/**
 * Breadcrumbs widget for Twitter Bootstrap 
 */
class Breadcrumbs extends CBreadcrumbs
{

    public $tagName = 'ul';
    public $htmlOptions = array('class' => 'breadcrumb');

    public function run()
    {
        if (empty($this->links))
            return;

        echo CHtml::openTag($this->tagName, $this->htmlOptions) . "\n";
        $links = '<li>' . CHtml::link('Главная', '/') . '<span class="divider">/</span></li>';

        $count = count($this->links);
        $i = 1;
        foreach ($this->links as $label => $url)
        {
            if (is_string($label) || is_array($url))
            {
                $links .= '<li>' . CHtml::link($this->encodeLabel ? CHtml::encode($label) : $label, $url);
                if ($count != $i)
                    $links .= '<span class="divider">/</span>';
                $links .= '</li>';
            } else
            {
                $links .= '<li class="active">' . ($this->encodeLabel ? CHtml::encode($url) : $url);
                if ($count != $i)
                    $links .= '<span class="divider">/</span>';
                $links .= '</li>';
            }
            $i++;
        }
        echo $links;
        echo CHtml::closeTag($this->tagName);
    }


}