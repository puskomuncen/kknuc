<?php

namespace PHPMaker2025\kkndanpkl;

use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Menu Rendering Event
 */
class MenuRenderingEvent extends GenericEvent
{
    public const NAME = "menu.rendering";

    public function getMenu(): Menu
    {
        return $this->subject;
    }
}
