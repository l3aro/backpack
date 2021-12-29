<?php

namespace Modules\Core\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Modules\Core\Services\Contracts\UserService;

class Edit extends Component
{
    use WithFileUploads;
    use LoadLayoutView;

    public $viewPath = 'core::livewire.admin.user.edit';
    public User $user;
    public $photo;
    public $password;
    public $password_confirmation;

    protected function rules()
    {
        return [
            'user.name' => 'required|string|max:255',
            'user.is_admin' => 'required|boolean',
            'user.email' => 'required|string|email|max:255|unique:users,email,' . $this->user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'photo' => 'nullable|image|max:2048|dimensions:ratio=1/1',
        ];
    }

    public function mount(User $user)
    {
        $this->user = $user;
    }

    protected function save()
    {
        $this->resetErrorBag();
        $this->validate();

        /** @var UserService */
        $userService = app(UserService::class);
        if ($this->password) {
            $this->user->password = $this->password;
        }
        $userService->update($this->user->id, $this->user->getDirty());

        if ($this->photo) {
            $userService->uploadProfilePhoto($this->user->id, $this->photo);
        }

        return $this->user;
    }

    public function saveAndShow()
    {
        $user = $this->save();
        return redirect()->route('admin.users.show', $user->id);
    }

    public function  saveAndContinue()
    {
        $this->save();
        $this->dispatchBrowserEvent('success', [
            'message' => __('User updated successfully.'),
        ]);
    }
}
