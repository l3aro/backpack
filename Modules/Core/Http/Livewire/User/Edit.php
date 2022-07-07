<?php

namespace Modules\Core\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use MichaelRubel\LoopFunctions\Traits\LoopFunctions;
use Modules\Core\Enums\UserTypeEnum;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Modules\Core\Http\Requests\EditUserRequest;
use Modules\Core\Services\Contracts\UserService;

class Edit extends Component
{
    use WithFileUploads;
    use LoadLayoutView;
    use LoopFunctions;

    public $viewPath = 'core::livewire.user.edit';

    public User $user;

    public $photo;

    public $password;

    public $password_confirmation;

    public $type;

    protected function rules()
    {
        return EditUserRequest::baseRules($this->user);
    }

    public function mount(User $user)
    {
        $this->user = $user;
        $this->propertiesFrom($this->user);
        $this->type = $this->user->type;
    }

    protected function save()
    {
        $this->resetErrorBag();
        $validated = $this->validate();

        /** @var UserService */
        $userService = app(UserService::class);
        if ($this->password) {
            $this->user->password = $this->password;
        }
        $userService->update($this->user->id, $validated);

        if ($this->photo) {
            $this->user = $userService->uploadProfilePhoto($this->user->id, $this->photo);
            $this->photo = null;
        }

        return $this->user;
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
            'message' => __('User updated successfully.'),
        ]);
    }

    public function getUserTypeEnumLabelsProperty()
    {
        return UserTypeEnum::labels();
    }
}
