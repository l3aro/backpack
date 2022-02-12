<?php

namespace Modules\Core\Http\Livewire\Plugins;

trait LoadLayoutView
{
    public function render()
    {
        return view($this->getViewPath(), $this->getViewData())
            ->layout($this->getLayoutPath(), $this->getLayoutData());
    }

    protected function getViewPath()
    {
        if (method_exists($this, 'viewPath')) {
            return $this->viewPath();
        }
        return property_exists($this, 'viewPath') ? $this->viewPath : null;
    }

    protected function getLayoutPath()
    {
        if (method_exists($this, 'layoutPath')) {
            return $this->layoutPath();
        }
        return property_exists($this, 'layoutPath') ? $this->layoutPath : config('core.layout-auth');
    }

    protected function getViewData(): array
    {
        if (method_exists($this, 'viewData')) {
            return $this->viewData();
        }
        return property_exists($this, 'viewData') ? $this->viewData : [];
    }

    protected function getLayoutData(): array
    {
        if (method_exists($this, 'layoutData')) {
            return $this->layoutData();
        }
        return property_exists($this, 'layoutData') ? $this->layoutData : [];
    }
}
