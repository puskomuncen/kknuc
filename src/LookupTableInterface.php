<?php

namespace PHPMaker2025\kkndanpkl;

/**
 * Lookup table interface
 */
interface LookupTableInterface
{

    public function renderLookupForEdit(string $name, mixed $value): mixed;

    public function renderLookupForView(string $name, mixed $value): mixed;

    public function lookupSelecting(DbField $field, string &$filter): void;
}
