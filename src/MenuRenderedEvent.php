<?php

namespace PHPMaker2025\kkndanpkl;

use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Menu Rendered Event
 */
class MenuRenderedEvent extends GenericEvent
{
    public const NAME = "menu.rendered";

    public function getMenu(): Menu
    {
        return $this->subject;
    }
}
