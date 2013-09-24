<?php

use StatusBoard\Renderer\WidgetRenderer;

class HtmlRendererTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test that an exception is raised when no suitable renderers are found
     */
    public function testException()
    {
        $this->setExpectedException('StatusBoard\Exception\UnsupportedException');

        $widget = $this->getMock('StatusBoard\Widget\WidgetInterface');

        $widgetRenderer = new WidgetRenderer();
        $widgetRenderer->render($widget);
    }

    /**
     * Test adding a single renderer
     */
    public function testAddingRenderer()
    {
        $widgetRenderer = new WidgetRenderer();
        $widget = $this->getMock('StatusBoard\Widget\WidgetInterface');

        $this->assertEquals(false, $widgetRenderer->supports($widget));

        $renderer = $this->getMock('StatusBoard\Renderer\RendererInterface');
        $renderer->expects($this->once())
            ->method('supports')
            ->will($this->returnValue(true));

        $widgetRenderer->addRenderer('renderer', $renderer);

        $this->assertEquals(true, $widgetRenderer->supports($widget));
    }

    /**
     * Test adding multiple renderers
     */
    public function testAddingRenderers()
    {
        $widgetRenderer = new WidgetRenderer();
        $widget = $this->getMock('StatusBoard\Widget\WidgetInterface');

        $this->assertEquals(false, $widgetRenderer->supports($widget));

        $renderer1 = $this->getMock('StatusBoard\Renderer\RendererInterface');
        $renderer1->expects($this->any())
            ->method('supports')
            ->will($this->returnValue(false));

        $renderer2 = $this->getMock('StatusBoard\Renderer\RendererInterface');
        $renderer2->expects($this->once())
            ->method('supports')
            ->will($this->returnValue(true));

        $widgetRenderer->setRenderers(array(
            $renderer1
        ));

        $this->assertEquals(false, $widgetRenderer->supports($widget));

        $widgetRenderer->setRenderers(array(
            $renderer1,
            $renderer2
        ));

        $this->assertEquals(true, $widgetRenderer->supports($widget));
    }

    /**
     * Test rendering
     */
    public function testRender()
    {
        $widgetRenderer = new WidgetRenderer();
        $widget = $this->getMock('StatusBoard\Widget\WidgetInterface');

        $renderer = $this->getMock('StatusBoard\Renderer\RendererInterface');
        $renderer->expects($this->once())
            ->method('supports')
            ->will($this->returnValue(true));

        $renderer->expects($this->once())
            ->method('render')
            ->will($this->returnValue("some html"));

        $widgetRenderer->addRenderer('renderer', $renderer);

        $this->assertEquals("some html", $widgetRenderer->render($widget));
    }
}
