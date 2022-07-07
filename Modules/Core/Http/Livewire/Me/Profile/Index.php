<?php

namespace Modules\Core\Http\Livewire\Me\Profile;

use App\Models\User;
use Livewire\Component;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;

class Index extends Component
{
    use LoadLayoutView;

    public $viewPath = 'core::livewire.me.profile.index';

    public User $user;

    public function mount()
    {
        $this->user = auth('admin')->user();
    }
}
