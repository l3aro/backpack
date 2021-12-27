<?php

namespace Modules\Core\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Modules\Core\Enums\UserTypeEnum;
use Modules\Core\Http\Livewire\Plugins\LoadAdminView;

class Show extends Component
{
    use LoadAdminView;

    public $viewPath = 'core::livewire.admin.user.show';
    public User $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    protected function getViewData(): array
    {
        return [
            'userType' => app(UserTypeEnum::class)->label($this->user->is_admin),
        ];
    }
}
