<?php

namespace Modules\Core\Services\Eloquent;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\UploadedFile;
use Modules\Core\Services\Contracts\UserService;

class UserServiceEloquent implements UserService
{
    public function query(): Builder
    {
        return User::query();
    }

    public function create(array $data): User
    {
        $data = $this->preparePassword($data);

        return User::create($data);
    }

    protected function preparePassword(array $data): array
    {
        if (isset($data['password']) && $data['password'] !== '') {
            $data['password'] = bcrypt($data['password']);
            return $data;
        }

        unset($data['password']);
        return $data;
    }

    public function update(User|int $modelOrId, array $data): User
    {
        $model = $this->find($modelOrId);

        $data = $this->preparePassword($data);

        $model->update($data);

        return $model;
    }

    public function delete(User|int $modelOrId): void
    {
        $model = $this->find($modelOrId);

        $model->delete();
    }

    public function find(User|int $modelOrId): ?User
    {
        return $modelOrId instanceof User ? $modelOrId : User::find($modelOrId);
    }

    public function uploadProfilePhoto(User|int $modelOrId, UploadedFile $photo): User
    {
        $model = $this->find($modelOrId);

        $model->updateProfilePhoto($photo);

        return $model;
    }

    public function getModel(): string
    {
        return User::class;
    }
}
