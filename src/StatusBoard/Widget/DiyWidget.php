<?php

namespace StatusBoard\Widget;

/**
 * Class DiyWidget
 */
class DiyWidget implements WidgetInterface
{
    private $html;

    /**
     * @param string $html
     *
     * @return DiyWidget
     */
    public function setHtml($html)
    {
        $this->html = $html;

        return $this;
    }

    /**
     * @return string
     */
    public function getHtml()
    {
        return $this->html;
    }
}
