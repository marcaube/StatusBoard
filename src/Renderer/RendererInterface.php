<?php

namespace StatusBoard\Renderer;

use StatusBoard\Widget\WidgetInterface;

/**
 * Class RendererInterface
 */
interface RendererInterface
{
    /**
     * Render a widget
     *
     * @param WidgetInterface $widget
     *
     * @return mixed
     */
    public function render(WidgetInterface $widget);

    /**
     * Check wether this renderer supports a certain type of widget
     *
     * @param WidgetInterface $widget
     *
     * @return boolean
     */
    public function supports(WidgetInterface $widget);
}
