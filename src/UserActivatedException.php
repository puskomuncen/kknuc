<?php

namespace PHPMaker2025\kkndanpkl;

use Symfony\Component\Security\Core\Exception\AuthenticationException;

/**
 * User activated by Login Link but login is required
 */
class UserActivatedException extends AuthenticationException
{
}
