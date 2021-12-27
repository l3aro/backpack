<?php

namespace Modules\Core\Http\Livewire\Admin\Metric;

use Livewire\Component;

class UserCount extends Component
{
    public function render()
    {
        return view('core::livewire.admin.metric.user-count', [
            'userCount' => \App\Models\User::count(),
        ]);
    }
}
