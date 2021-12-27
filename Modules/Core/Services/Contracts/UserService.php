<?php

namespace Modules\Core\Services\Contracts;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\UploadedFile;

interface UserService
{
    public function query(): Builder;
    public function create(array $data): User;
    public function update(User|int $modelOrId, array $data): User;
    public function delete(User|int $modelOrId): void;
    public function find(User|int $modelOrId): ?User;
    public function uploadProfilePhoto(User|int $modelOrId, UploadedFile $photo): User;
    public function getModel(): string;
}
