<?php

namespace StatusBoard\Widget;

use StatusBoard\Exception\InvalidArgumentException;
use StatusBoard\Model\GraphData;

/**
 * Class GraphWidget
 */
class GraphWidget implements WidgetInterface
{
    private $title;
    private $total;
    private $type;
    private $dataSequences;

    public function __construct()
    {
        $this->dataSequences = array();
    }

    /**
     * @param string $title
     *
     * @return GraphWidget
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param bool $bool
     *
     * @return GraphWidget
     */
    public function showTotal($bool)
    {
        $this->total = $bool;

        return $this;
    }

    /**
     * @param string $type
     *
     * @return GraphWidget
     */
    public function setType($type)
    {
        $validTypes = array('bar', 'line');

        if (!in_array($type, $validTypes)) {
            throw new InvalidArgumentException(sprintf('The valid types are %s.', implode(', ', $validTypes)));
        }

        $this->type = $type;

        return $this;
    }

    /**
     * @param GraphData $dataPoints
     *
     * @return GraphWidget
     */
    public function addDataPoints(GraphData $dataPoints)
    {
        $this->dataSequences[] = $dataPoints;

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

        if (isset($this->total) && $this->total) {
            $graph['total'] = $this->total;
        }

        if (isset($this->type)) {
            $graph['type'] = $this->type;
        }

        /** @var GraphData $sequence */
        foreach ($this->dataSequences as $sequence) {
            $graph['datasequences'][] = $sequence->toArray();
        }

        return $graph;
    }
}
