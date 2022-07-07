<?php

namespace Modules\Core\Navigation;

interface Section
{
    public function add(callable $callback): static;
}
