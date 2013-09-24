<?php

use StatusBoard\Widget\GraphWidget;

class GraphWidgetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test setTitle
     */
    public function testTitle()
    {
        $widget = new GraphWidget();

        $this->assertFalse(array_key_exists("title", $widget->toArray()));

        $widget->setTitle('graph');

        $this->assertArrayHasKey("title", $widget->toArray());
        $this->assertContains("graph", $widget->toArray());
    }

    /**
     * Test showTotal
     */
    public function testTotal()
    {
        $widget = new GraphWidget();

        $this->assertFalse(array_key_exists("total", $widget->toArray()));

        $widget->showTotal(true);

        $this->assertArrayHasKey("total", $widget->toArray());
        $this->assertContains("true", $widget->toArray());

        $widget->showTotal(false);

        $this->assertFalse(array_key_exists("total", $widget->toArray()));
    }

    /**
     * Test setType
     */
    public function testType()
    {
        $widget = new GraphWidget();

        $this->assertFalse(array_key_exists("type", $widget->toArray()));

        $widget->setType('line');

        $this->assertArrayHasKey("type", $widget->toArray());
        $this->assertContains("line", $widget->toArray());

        $widget->setType('bar');

        $this->assertContains("bar", $widget->toArray());
    }

    /**
     * Test setType with invalid arg
     */
    public function testInvalidType()
    {
        $this->setExpectedException('StatusBoard\Exception\InvalidArgumentException');

        $widget = new GraphWidget();
        $widget->setType('super-pie-chart');
    }

    /**
     * Test addDataPoints
     */
    public function testAddDataPoints()
    {
        $input = array(
            "datapoints" => array(
                array("title" => "answer to life", "value" => 42)
            )
        );
        $output = array(
            "datasequences" => array(
                $input
            )
        );

        $widget = new GraphWidget();

        $data = $this->getMock('StatusBoard\Model\GraphData');
        $data->expects($this->once())
            ->method('toArray')
            ->will($this->returnValue($input));

        $widget->addDataPoints($data);

        $this->assertEquals($output, $widget->toArray());
    }
}
