<?php

namespace StatusBoard\Renderer;

use StatusBoard\Widget\WidgetInterface;
use StatusBoard\Widget\TableWidget;

/**
 * Class HtmlRenderer
 */
class HtmlRenderer implements RendererInterface
{
    /**
     * {@inheritdoc}
     */
    public function render(WidgetInterface $widget)
    {
        if (is_a($widget, "StatusBoard\\Widget\\TableWidget")) {
            return $this->renderTable($widget);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function supports(WidgetInterface $widget)
    {
        if (is_a($widget, "StatusBoard\\Widget\\TableWidget")) {
            return true;
        }

        return false;
    }

    /**
     * Render a TableWidget in HTML
     *
     * @param TableWidget $widget
     *
     * @return string
     */
    private function renderTable(TableWidget $widget)
    {
        $output = "<table>";

        foreach ($widget->getRows() as $row) {
            $output .= "<tr>";

            foreach ($row as $cell) {
                $output .= sprintf("<td>%s</td>", $cell);
            }

            $output .= "</tr>";
        }

        return $output . "</table>";
    }
}
