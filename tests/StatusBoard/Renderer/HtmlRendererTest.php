<?php

use StatusBoard\Renderer\HtmlRenderer;

class HtmlRendererTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test the html table rendering
     */
    public function testTableRender()
    {
        $input = array(array('cell1', 'cell2', 'cell3'));
        $output = "<table><tr><td>cell1</td><td>cell2</td><td>cell3</td></tr></table>";

        // Create a widget stub
        $widget = $this->getMock('StatusBoard\Widget\TableWidget');
        $widget->expects($this->once())
            ->method('getRows')
            ->will($this->returnValue($input));

        $renderer = new HtmlRenderer();

        $this->assertEquals($output, $renderer->render($widget));
    }

    /**
     * Test the DIY widget rendering
     */
    public function testDiyRenderer()
    {
        $html = "<h1>HTML DIY Widget</h1>";

        // Create a widget stub
        $widget = $this->getMock('StatusBoard\Widget\DiyWidget');
        $widget->expects($this->once())
            ->method('getHtml')
            ->will($this->returnValue($html));

        $renderer = new HtmlRenderer();

        $this->assertEquals($html, $renderer->render($widget));
    }

    /**
     * Test rendering an unsupported widget
     */
    public function testUnsupportedRender()
    {
        $renderer = new HtmlRenderer();
        $widget = $this->getMock('StatusBoard\Widget\GraphWidget');

        $renderer->render($widget);
    }

    /**
     * Test the supports method
     */
    public function testSupports()
    {
        $tableWidget = $this->getMock('StatusBoard\Widget\TableWidget');
        $graphWidget = $this->getMock('StatusBoard\Widget\GraphWidget');
        $diyWidget   = $this->getMock('StatusBoard\Widget\DiyWidget');

        $renderer = new HtmlRenderer();

        $this->assertEquals(true, $renderer->supports($tableWidget));
        $this->assertEquals(false, $renderer->supports($graphWidget));
        $this->assertEquals(true, $renderer->supports($diyWidget));
    }
}
