<?php

namespace Modules\Portfolio\Http\Livewire\Plugins;

use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;

trait LoadWebLayout
{
    use LoadLayoutView;

    protected $layoutPath = 'portfolio::layouts.web';
}
