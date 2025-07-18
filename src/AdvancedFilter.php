<?php

namespace PHPMaker2025\kkndanpkl;

/**
 * Advanced filter class
 */
class AdvancedFilter
{
    public bool $Enabled = true;

    public function __construct(
        public readonly string $ID,
        public readonly string $Name,
        public string $FunctionName,
    ) {
    }
}
