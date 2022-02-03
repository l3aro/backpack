<?php

namespace Modules\Portfolio\Http\Livewire;

use Livewire\Component;
use Modules\Portfolio\Http\Livewire\Plugins\LoadWebLayout;

class BlogDetail extends Component
{
    use LoadWebLayout;

    protected $viewPath = 'portfolio::livewire.blog-detail';
}
