<?php

namespace StatusBoard\Model;

use StatusBoard\Exception\InvalidArgumentException;

/**
 * Class GraphData
 */
class GraphData
{
    private $title;
    private $refreshInterval;
    private $color;
    private $dataPoints;

    public function __construct()
    {
        $this->dataPoints = array();
    }

    /**
     * @param string $title
     *
     * @return GraphData
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param int $seconds
     *
     * @return GraphData
     *
     * @throws InvalidArgumentException
     */
    public function setRefreshInterval($seconds)
    {
        if ($seconds < 15) {
            throw new InvalidArgumentException('The minimum refresh interval is 15 seconds.');
        }

        $this->refreshInterval = $seconds;

        return $this;
    }

    /**
     * @param string $color
     *
     * @return GraphData
     */
    public function setColor($color)
    {
        $validColors = array('yellow', 'green', 'red', 'purple', 'blue', 'mediumGray', 'pink', 'aqua', 'orange', 'lightGray');

        if (!in_array($color, $validColors)) {
            throw new InvalidArgumentException(sprintf('The valid colors are %s.', implode(', ', $validColors)));
        }

        $this->color = $color;

        return $this;
    }

    /**
     * @param string       $title
     * @param string|float $value
     *
     * @return GraphData
     */
    public function addDataPoint($title, $value)
    {
        $this->dataPoints[] = array(
            "title" => $title,
            "value" => $value
        );

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $graph = array();

        if (isset($this->title)) {
            $graph['title'] = $this->title;
        }

        if (isset($this->refreshInterval)) {
            $graph['refreshEveryNSeconds'] = $this->refreshInterval;
        }

        if (isset($this->color)) {
            $graph['color'] = $this->color;
        }

        $graph['datapoints'] = $this->dataPoints;

        return $graph;
    }
}
