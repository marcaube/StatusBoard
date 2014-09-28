<?php

namespace StatusBoard\Tests\Renderer;

use StatusBoard\Renderer\JsonRenderer;

class JsonRendererTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test the json Graph rendering
     */
    public function testGraphRender()
    {
        $input = array(
            "title" => "graph",
            "datasequences" => array(
                array(
                    "title" => "data",
                    "datapoints" => array(
                        array(
                            "title" =>"1",
                            "value" => 2
                        )
                    )
                )
            )
        );
        $output = '{"graph":{"title":"graph","datasequences":[{"title":"data","datapoints":[{"title":"1","value":2}]}]}}';

        // Create a widget stub
        $widget = $this->getMock('StatusBoard\Widget\GraphWidget');
        $widget->expects($this->once())
            ->method('toArray')
            ->will($this->returnValue($input));

        $renderer = new JsonRenderer();

        $this->assertEquals($output, $renderer->render($widget));
    }

    /**
     * Test rendering an unsupported widget
     */
    public function testUnsupportedRender()
    {
        $renderer = new JsonRenderer();
        $widget = $this->getMock('StatusBoard\Widget\TableWidget');

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

        $renderer = new JsonRenderer();

        $this->assertEquals(false, $renderer->supports($tableWidget));
        $this->assertEquals(true, $renderer->supports($graphWidget));
        $this->assertEquals(false, $renderer->supports($diyWidget));
    }
}
