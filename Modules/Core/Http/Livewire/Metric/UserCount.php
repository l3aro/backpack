<?php

namespace Modules\Core\Http\Livewire\Metric;

use Livewire\Component;

class UserCount extends Component
{
    public function render()
    {
        return view('core::livewire.metric.user-count', [
            'userCount' => \App\Models\User::count(),
        ]);
    }
}
