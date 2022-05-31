<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Core\Enums\UserTypeEnum;
use Modules\Core\Models\Plugins\HasBitwiseFlag;
use Modules\Core\Models\Plugins\HasProfilePhoto;
use Baro\PipelineQueryCollection;
use Baro\PipelineQueryCollection\Concerns\Filterable;
use Baro\PipelineQueryCollection\Contracts\CanFilterContract;

class User extends Authenticatable implements CanFilterContract
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasBitwiseFlag;
    use HasProfilePhoto;
    use Filterable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'type_flag',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_photo_url',
        'type',
    ];

    protected $attributes = [
        'name' => '',
        'email' => '',
        'password' => '',
        'type_flag' => null,
    ];

    public function isVerified()
    {
        return $this->email_verified_at !== null;
    }

    public function getTypeAttribute()
    {
        return collect(UserTypeEnum::cases())
            ->map(function (UserTypeEnum $flag) {
                return $this->hasFlag('type_flag', $flag->value) ? $flag->value : null;
            })
            ->filter()
            ->values()
            ->all();
    }

    public function setTypeAttribute($values)
    {
        collect(UserTypeEnum::cases())
            ->map(function (UserTypeEnum $flag) use ($values) {
                $value = in_array($flag->value, $values);
                $this->setFlag('type_flag', $flag->value, $value);
            });
    }

    public function checkType(UserTypeEnum $type): bool
    {
        return $this->hasFlag('type_flag', $type->value);
    }

    protected function typeBadge(): Attribute
    {
        return Attribute::make(
            get: fn () => collect(UserTypeEnum::cases())
                ->map(function (UserTypeEnum $flag) {
                    return $this->hasFlag('type_flag', $flag->value) ? $flag->badge() : null;
                })
                ->filter()
                ->values()
                ->join(' ')
        );
    }

    public function isActive()
    {
        return !$this->hasFlag('type_flag', UserTypeEnum::DEACTIVATED->value);
    }

    public function getFilters(): array
    {
        return [
            new PipelineQueryCollection\ScopeFilter('search'),
            (new PipelineQueryCollection\BitwiseFilter('type'))->filterOn('type_flag'),
            new PipelineQueryCollection\DateFromFilter,
            new PipelineQueryCollection\DateToFilter,
            new PipelineQueryCollection\Sort,
        ];
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('id', $search)
                ->orWhere('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        });
    }
}
