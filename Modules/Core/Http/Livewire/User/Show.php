<?php

namespace Modules\Core\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Modules\Core\Enums\UserTypeEnum;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;

class Show extends Component
{
    use LoadLayoutView;

    public $viewPath = 'core::livewire.user.show';
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
