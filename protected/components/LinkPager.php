<?php

class LinkPager extends CLinkPager
{

    public function run()
    {
        $buttons = $this->createPageButtons();
        if (empty($buttons))
            return;

        echo CHtml::tag('ul', $this->htmlOptions, implode("\n", $buttons));
    }


    protected function createPageButtons()
    {
        if (($pageCount = $this->getPageCount()) <= 1)
            return array();

        list($beginPage, $endPage) = $this->getPageRange();
        $currentPage = $this->getCurrentPage(false); // currentPage is calculated in getPageRange()
        $buttons = array();

        if (($page = $currentPage - 1) < 0)
            $page = 0;
        $buttons[] = $this->createPageButton('←', $page, self::CSS_PREVIOUS_PAGE, $currentPage <= 0, false);

        for ($i = $beginPage; $i <= $endPage; ++$i)
            $buttons[] = $this->createPageButton($i + 1, $i, self::CSS_INTERNAL_PAGE, false, $i == $currentPage);

        if (($page = $currentPage + 1) >= $pageCount - 1)
            $page = $pageCount - 1;
        $buttons[] = $this->createPageButton('→', $page, self::CSS_NEXT_PAGE, $currentPage >= $pageCount - 1, false);

        return $buttons;
    }


    protected function createPageButton($label, $page, $class, $hidden, $selected)
    {
        if ($selected || $hidden)
            $class.=' active';
        return '<li class="' . $class . '">' . CHtml::link($label, $this->createPageUrl($page)) . '</li>';
    }


}