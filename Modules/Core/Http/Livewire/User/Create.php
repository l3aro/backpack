<?php

namespace Modules\Core\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Modules\Core\Services\Contracts\UserService;

class Create extends Component
{
    use WithFileUploads;
    use LoadLayoutView;

    public $viewPath = 'core::livewire.user.create';
    public User $user;
    public $photo;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'user.name' => 'required|string|max:255',
        'user.email' => 'required|string|email|max:255|unique:users,email',
        'user.is_admin' => 'required|boolean',
        'password' => 'required|string|min:6|confirmed',
        'photo' => 'nullable|image|max:2048|dimensions:ratio=1/1',
    ];

    public function mount()
    {
        $this->user = new User;
    }

    protected function save()
    {
        $this->resetErrorBag();
        $this->validate();

        /** @var UserService */
        $userService = app(UserService::class);

        $this->user->password = $this->password;
        $user = $userService->create($this->user->getDirty());
        if ($this->photo) {
            $userService->uploadProfilePhoto($user, $this->photo);
        }

        $this->user = new User;
        $this->reset(['photo', 'password', 'password_confirmation']);

        return $user;
    }

    public function saveAndShow()
    {
        $user  = $this->save();
        return redirect()->route('admin.users.show', $user->id);
    }

    public function saveAndContinue()
    {
        $this->save();
        $this->dispatchBrowserEvent('success', [
            'message' => __('User created successfully.'),
        ]);
    }
}
