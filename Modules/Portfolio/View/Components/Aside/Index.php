<?php

namespace Modules\Portfolio\View\Components\Aside;

use Illuminate\View\Component;
use Modules\Core\Navigation\Navigation;

class Index extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Navigation $navigation, public array $menu = [])
    {
        $this->menu = $navigation->toArray();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('portfolio::components.aside.index');
    }
}
