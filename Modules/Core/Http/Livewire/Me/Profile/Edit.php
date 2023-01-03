<?php

namespace Modules\Core\Http\Livewire\Me\Profile;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Modules\Core\Services\Contracts\UserService;

class Edit extends Component
{
    use WithFileUploads;
    use LoadLayoutView;

    public User $user;

    public $photo;

    public $password;

    public $password_confirmation;

    public $viewPath = 'core::livewire.me.profile.edit';

    protected $rules = [
        'user.name' => 'required|string|max:255',
        'password' => 'nullable|string|min:6|confirmed',
        'photo' => 'nullable|image|max:2048|dimensions:ratio=1/1',
    ];

    public function mount()
    {
        $this->user = User::find(auth('admin')->id());
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
            $this->photo = null;
        }
    }

    public function saveAndView()
    {
        $this->save();

        return redirect()->route('admin.me.profile.index');
    }

    public function saveAndContinue()
    {
        $this->save();

        $this->dispatchBrowserEvent('success', [
            'message' => 'Your profile has been updated successfully.',
        ]);
    }
}
