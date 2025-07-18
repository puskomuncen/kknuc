<?php

namespace PHPMaker2025\kkndanpkl;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * Menu Item Adding Event
 */
class MenuItemAddingEvent extends Event
{
    public const NAME = "menu.item.adding";

    public function __construct(
        private $menuItem = null,
        private $menu = null)
    {
    }

    public function getMenuItem(): MenuItem
    {
        return $this->menuItem;
    }

    public function getSubject(): MenuItem
    {
        return $this->menuItem;
    }

    public function setMenuItem(MenuItem $value): void
    {
        $this->menuItem = $value;
    }

    public function getMenu(): Menu
    {
        return $this->menu;
    }

    public function setMenu(Menu $value): void
    {
        $this->menu = $value;
    }
}
