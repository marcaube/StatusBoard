<?php

use StatusBoard\Model\GraphData;

class GraphDataTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test setTitle
     */
    public function testTitle()
    {
        $data = new GraphData();

        $this->assertFalse(array_key_exists("title", $data->toArray()));

        $data->setTitle('visits');

        $this->assertArrayHasKey("title", $data->toArray());
        $this->assertContains("visits", $data->toArray());
    }

    /**
     * Test setRefreshInterval
     */
    public function testRefreshInterval()
    {
        $data = new GraphData();

        $this->assertFalse(array_key_exists("refreshEveryNSeconds", $data->toArray()));

        $data->setRefreshInterval(30);

        $this->assertArrayHasKey("refreshEveryNSeconds", $data->toArray());
        $this->assertContains(30, $data->toArray());
    }

    /**
     * Test setRefreshInterval with invalid arg
     */
    public function testInvalidRefreshInterval()
    {
        $this->setExpectedException('StatusBoard\Exception\InvalidArgumentException');

        $data = new GraphData();
        $data->setRefreshInterval(10);
    }

    /**
     * Test setColor
     */
    public function testColor()
    {
        $data = new GraphData();

        $this->assertFalse(array_key_exists("color", $data->toArray()));

        $data->setColor('pink'); // oh yeah ... pink

        $this->assertArrayHasKey("color", $data->toArray());
        $this->assertContains("pink", $data->toArray());
    }

    /**
     * Test setColor with invalid arg
     */
    public function testInvalidColor()
    {
        $this->setExpectedException('StatusBoard\Exception\InvalidArgumentException');

        $data = new GraphData();
        $data->setColor('kinda-brownish');
    }

    public function testAddDataPoint()
    {
        $data = new GraphData();
        $data->addDataPoint("answer to life", 42);

        $output = $data->toArray();

        $this->assertArrayHasKey("datapoints", $output);
        $this->assertArrayHasKey("title", $output['datapoints'][0]);
        $this->assertContains("answer to life", $output['datapoints'][0]);
        $this->assertArrayHasKey("value", $output['datapoints'][0]);
        $this->assertContains(42, $output['datapoints'][0]);
    }
}
