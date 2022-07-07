<?php

namespace Modules\Core\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use MichaelRubel\LoopFunctions\Traits\LoopFunctions;
use Modules\Core\Enums\UserTypeEnum;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Modules\Core\Http\Requests\CreateUserRequest;
use Modules\Core\Services\Contracts\UserService;

class Create extends Component
{
    use WithFileUploads;
    use LoadLayoutView;
    use LoopFunctions;

    public $viewPath = 'core::livewire.user.create';

    public $photo;

    public $password;

    public $password_confirmation;

    public $type;

    protected function rules(): array
    {
        return CreateUserRequest::baseRules();
    }

    public function mount()
    {
        $this->resetState();
    }

    protected function resetState()
    {
        $this->propertiesFrom((new User()));
        $this->type = [];
    }

    protected function save()
    {
        $this->resetErrorBag();
        $validated = $this->validate();

        /** @var UserService */
        $userService = app(UserService::class);

        $user = $userService->create($validated);
        if ($this->photo) {
            $userService->uploadProfilePhoto($user, $this->photo);
        }

        $this->resetState();

        return $user;
    }

    public function saveAndShow()
    {
        $user = $this->save();

        return redirect()->route('admin.users.show', $user->id);
    }

    public function saveAndContinue()
    {
        $this->save();
        $this->dispatchBrowserEvent('success', [
            'message' => __('User created successfully.'),
        ]);
    }

    public function getUserTypeEnumLabelsProperty()
    {
        return UserTypeEnum::labels();
    }
}
