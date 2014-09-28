<?php

namespace StatusBoard\Renderer;

use StatusBoard\Exception\UnsupportedException;
use StatusBoard\Widget\WidgetInterface;

/**
 * Class WidgetRenderer
 */
class WidgetRenderer implements RendererInterface
{
    private $renderers;

    public function __construct()
    {
        $this->renderers = array();
    }

    /**
     * {@inheritdoc}
     */
    public function render(WidgetInterface $widget)
    {
        foreach ($this->renderers as $renderer) {
            if ($renderer->supports($widget)) {
                return $renderer->render($widget);
            }
        }

        throw new UnsupportedException(sprintf('There are no renderers for class %s.', get_class($widget)));
    }

    /**
     * {@inheritdoc}
     */
    public function supports(WidgetInterface $widget)
    {
        foreach ($this->renderers as $renderer) {
            if ($renderer->supports($widget)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Set renderers
     *
     * @param array $renderers
     */
    public function setRenderers(array $renderers)
    {
        foreach ($renderers as $name => $renderer) {
            $this->addRenderer($name, $renderer);
        }
    }

    /**
     * Add a renderer
     *
     * @param string            $name
     * @param RendererInterface $renderer
     */
    public function addRenderer($name, RendererInterface $renderer)
    {
        $this->renderers[$name] = $renderer;
    }
}
