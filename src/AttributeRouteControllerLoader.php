<?php

namespace PHPMaker2025\kkndanpkl;

use Symfony\Component\Routing\Loader\AttributeClassLoader;
use Symfony\Component\Routing\Route;

/**
 * AttributeRouteControllerLoader is an implementation of AttributeClassLoader
 * that sets the '_controller' default based on the class and method names.
 *
 * Based on https://github.com/symfony/framework-bundle/blob/6.4/Routing/AttributeRouteControllerLoader.php
 */
class AttributeRouteControllerLoader extends AttributeClassLoader
{
    /**
     * Configures the _controller default parameter of a given Route instance.
     */
    protected function configureRoute(Route $route, \ReflectionClass $class, \ReflectionMethod $method, object $annot): void
    {
        if ('__invoke' === $method->getName()) {
            $route->setDefault('_controller', $class->getName());
        } else {
            $route->setDefault('_controller', $class->getName() . ':' . $method->getName());
        }
    }

    /**
     * Makes the default route name more sane by removing common keywords.
     */
    protected function getDefaultRouteName(\ReflectionClass $class, \ReflectionMethod $method): string
    {
        $name = preg_replace('/(bundle|controller)_/', '_', parent::getDefaultRouteName($class, $method));
        if (str_ends_with($method->name, 'Action') || str_ends_with($method->name, '_action')) {
            $name = preg_replace('/action(_\d+)?$/', '\\1', $name);
        }
        return str_replace('__', '_', $name);
    }
}
