<?php

namespace Modules\Aoe2Notebook\Models;

use Baro\PipelineQueryCollection\Concerns\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Modules\Aoe2Notebook\Enums\AgeEnum;
use Modules\Aoe2Notebook\Enums\ExpansionEnum;
use Modules\Aoe2Notebook\Enums\UnitTypeEnum;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Unit extends Model implements HasMedia
{
    use InteractsWithMedia;
    use Filterable;

    protected $table = 'aoe2notebook_units';

    protected $guarded = ['id'];

    protected $casts = [
        'training_cost' => 'array',
        'upgrade_cost' => 'array',
        'type' => 'array',
        'expansion' => ExpansionEnum::class,
        'age' => AgeEnum::class,
    ];

    protected $attributes = [
        'name' => '',
        'expansion' => ExpansionEnum::DEFINITIVE_EDITION,
        'type' => '',
        'civilization' => '',
        'age' => AgeEnum::DARK_AGE,
        'description' => '',
        'training_time' => null,
        'training_cost' => null,
        'trained_at' => null,
        'hit_points' => null,
        'attack' => null,
        'rate_of_fire' => null,
        'frame_delay' => null,
        'attack_delay' => null,
        'minimum_range' => null,
        'range' => null,
        'accuracy' => null,
        'projectile_speed' => null,
        'melee_armor' => null,
        'pierce_armor' => null,
        'speed' => null,
        'line_of_sight' => null,
        'upgrade_from_id' => null,
        'upgrade_to_id' => null,
        'upgrade_cost' => null,
        'upgrade_time' => null,
    ];

    public function getFilters()
    {
        return [
            new \Baro\PipelineQueryCollection\ScopeFilter('search'),
            new \Baro\PipelineQueryCollection\Sort,
        ];
    }

    public function scopeSearch(Builder $query, string $keyword)
    {
        return $query->where(function (Builder $query) use ($keyword) {
            $query->where('id', $keyword)
                ->orWhere('name', 'like', "%{$keyword}%");
        });
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('default')
            ->singleFile()
            ->registerMediaConversions(function () {
                $this->addMediaConversion('thumb')
                    ->crop(Manipulations::CROP_CENTER, 450, 450)
                    ->optimize();
                $this->addMediaConversion('meta')
                    ->crop(Manipulations::CROP_CENTER, 1200, 1200)
                    ->optimize();
            });
    }

    protected function typeLabel(): Attribute
    {
        return Attribute::make(
            get: fn () => collect($this->type)
                ->sort()
                ->map(fn ($type) => UnitTypeEnum::tryFrom($type)->label())
                ->implode(' ')
        );
    }
}
