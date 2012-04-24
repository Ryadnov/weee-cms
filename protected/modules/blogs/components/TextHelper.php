<?php

class TextHelper extends CComponent
{

    public $config = array('auto_br' => true);

    public function purify($text)
    {
        Yii::import('blogs.vendors.*');
        include('jevix.php');

        $jevix = new Jevix;
        $jevix->cfgAllowTags(array('cut', 'a', 'strike', 'thead', 'tbody', 'font', 'img', 'blockquote', 'p', 'span', 'i', 'b', 'u', 's', 'em', 'strong', 'nobr', 'li', 'ol', 'ul', 'sup', 'abbr', 'sub', 'acronym', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'br', 'hr', 'pre', 'code', 'object', 'param', 'embed', 'blockquote', 'video', 'br', 'center', 'table', 'tr', 'td', 'div'));
        $jevix->cfgSetTagShort(array('br', 'img', 'hr', 'cut'));
        $jevix->cfgSetTagPreformatted(array('pre', 'code'));

        $jevix->cfgAllowTagParams('object', array('width' => '#int', 'height' => '#int', 'data' => '#link'));
        $jevix->cfgAllowTagParams('param', array('name' => '#text', 'value' => '#text'));
        $jevix->cfgAllowTagParams('img', array('src' => '#text', 'alt' => '#text', 'style' => '#text', 'class' => '#text'));
        $jevix->cfgAllowTagParams('a', array('href' => '#text'));
        $jevix->cfgAllowTagParams('p', array('align' => '#text'));
        $jevix->cfgAllowTagParams('span', array('style' => '#text'));
        $jevix->cfgAllowTagParams('font', array('color' => '#text'));
        $jevix->cfgAllowTagParams('div', array('align' => '#text'));
        $jevix->cfgAllowTagParams('tr', array('class' => '#text', 'style' => '#text'));
        $jevix->cfgAllowTagParams('td', array('class' => '#text', 'style' => '#text'));
        $jevix->cfgAllowTagParams('table', array('class' => '#text', 'style' => '#text'));
        $jevix->cfgAllowTagParams('h3', array('id' => '#text'));

        $jevix->cfgSetTagCutWithContent(array('script', 'iframe', 'style'));
        $jevix->cfgSetTagChilds('object', 'param', false, true);
        $jevix->cfgSetTagChilds('object', 'embed', false, false);
        $jevix->cfgSetTagNoTypography('object', 'video', 'code', 'pre');
        $jevix->cfgSetAutoLinkMode(false);
        $jevix->cfgSetAutoReplace(array('(c)', '(r)'), array('©', '®'));
        $jevix->cfgSetAutoBrMode(true);

        $errors = null;
        $text = $jevix->parse($text, $errors);

        // YouTube
        $text = preg_replace('#<video>(?:http://)?(?:www\\.)?youtu\\.?be(?:/|\\.com.*v(?:=|/))([a-z0-9_-]+)(?:.*(?:t=([smh0-9]+)))?.*</video>#i', '<center><iframe width="560" height="315"  src="http://www.youtube.com/v/$1" frameborder="0" allowfullscreen></iframe></center>', $text);
        // own3d
        $text = preg_replace('#<video>http:\/\/www.own3d.tv\/live\/([0-9]*)\/(.*?)</video>#Ui', "<center><object width='640' height='360'><param name='movie' value='http://www.own3d.tv/livestream/$1' /><param name='allowfullscreen' value='true' /><param name='wmode' value='transparent' /><embed src='http://www.own3d.tv/livestream/$1' type='application/x-shockwave-flash' allowfullscreen='true' width='640' height='360' wmode='transparent'></embed></object></center>", $text);
        // RuTube
        $text = preg_replace('#<video>http:\/\/(?:www\.|)rutube.ru\/tracks\/\d+.html\?v=([^< ]*?)</video>#Ui', '<center><OBJECT width="470" height="353"><PARAM name="movie" value="http://video.rutube.ru/$1"></PARAM><PARAM name="wmode" value="opaque"></PARAM><PARAM name="allowFullScreen" value="true"></PARAM><PARAM name="flashVars" value="uid=662118"></PARAM><EMBED src="http://video.rutube.ru/$1" type="application/x-shockwave-flash" wmode="opaque" width="640" height="360" allowFullScreen="true" flashVars="uid=662118"></EMBED></OBJECT></center>', $text);
        // twitch
        $text = preg_replace("#<video>(?:http://|)?(?:ru\.|)twitch.tv/(.*?)</video>#i", '<center><object type="application/x-shockwave-flash" height="450" width="600" id="live_embed_player_flash" data="http://ru.twitch.tv/widgets/live_embed_player.swf?channel=$1" bgcolor="#000000"><param name="allowFullScreen" value="true" /><param name="allowScriptAccess" value="always" /><param name="allowNetworking" value="all" /><param name="movie" value="http://ru.twitch.tv/widgets/live_embed_player.swf" /><param name="flashvars" value="hostname=ru.twitch.tv&channel=$1&auto_play=false&start_volume=25" /></object></center>', $text);
        return $text;
    }


}