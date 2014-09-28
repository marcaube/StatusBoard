<?php

namespace StatusBoard\Tests\Widgets;

use StatusBoard\Widget\DiyWidget;

class DiyWidgetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Testing the html widget
     */
    public function testHTML()
    {
        $html = "<h1>HTML DIY Widget</h1>";

        $widget = new DiyWidget();
        $widget->setHtml($html);

        $this->assertEquals($widget->getHtml(), $html);
    }
}
