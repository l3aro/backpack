<?php

namespace Modules\Core\Http\Livewire\Admin\Me\Profile;

use App\Models\User;
use Livewire\Component;
use Modules\Core\Http\Livewire\Plugins\LoadAdminView;

class Index extends Component
{
    use LoadAdminView;

    public $viewPath = 'core::livewire.admin.me.profile.index';
    public User $user;

    public function mount()
    {
        $this->user = auth('admin')->user();
    }
}
