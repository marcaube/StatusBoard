<?php

namespace StatusBoard\Renderer;

use StatusBoard\Widget\WidgetInterface;
use StatusBoard\Widget\GraphWidget;

/**
 * Class JsonRenderer
 */
class JsonRenderer implements RendererInterface
{
    /**
     * {@inheritdoc}
     */
    public function render(WidgetInterface $widget)
    {
        if (is_a($widget, "StatusBoard\\Widget\\GraphWidget")) {
            return $this->renderGraph($widget);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function supports(WidgetInterface $widget)
    {
        if (is_a($widget, "StatusBoard\\Widget\\GraphWidget")) {
            return true;
        }

        return false;
    }

    /**
     * Render a GraphWidget in Json
     *
     * @param GraphWidget $widget
     *
     * @return string
     */
    private function renderGraph(GraphWidget $widget)
    {
        $graph = array(
            "graph" => $widget->toArray()
        );

        return json_encode($graph);
    }
}
