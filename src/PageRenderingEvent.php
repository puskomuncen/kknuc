<?php

namespace PHPMaker2025\kkndanpkl;

use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Page Rendering Event
 */
class PageRenderingEvent extends GenericEvent
{
    public const NAME = "page.rendering";

    public function getPage(): mixed
    {
        return $this->subject;
    }
}
