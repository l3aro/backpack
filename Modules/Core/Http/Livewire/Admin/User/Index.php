<?php

namespace Modules\Core\Http\Livewire\Admin\User;

use Livewire\Component;
use Modules\Core\Http\Livewire\Plugins\CanDestroyRecord;
use Modules\Core\Http\Livewire\Plugins\HasDataTable;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Modules\Core\Services\Contracts\UserService;

/**
 * @property UserService $userService
 */
class Index extends Component
{
    use HasDataTable;
    use LoadLayoutView;
    use CanDestroyRecord;

    public $viewPath = 'core::livewire.admin.user.index';

    public function mount()
    {
        $this->sort = ['id' => 'desc'];
    }

    protected function getModel()
    {
        return $this->userService->getModel();
    }

    protected function getViewData(): array
    {
        return [
            'users' => $this->queryBuilder($this->userService->query())
                ->filter()
                ->paginate($this->perPage),
        ];
    }

    public function getUserTypeProperty()
    {
        return app(\Modules\Core\Enums\UserTypeEnum::class);
    }

    public function getUserServiceProperty()
    {
        return app(UserService::class);
    }
}
