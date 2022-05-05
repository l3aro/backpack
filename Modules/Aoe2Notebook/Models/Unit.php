<?php

namespace Modules\Aoe2Notebook\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;
use Modules\Aoe2Notebook\Enums\AgeEnum;
use Modules\Aoe2Notebook\Enums\ExpansionEnum;
use Modules\Aoe2Notebook\Enums\UnitTypeEnum;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Unit extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = "aoe2notebook_units";

    protected $guarded = ['id'];

    protected $casts = [
        'training_cost' => 'array',
        'upgrade_cost' => 'array',
        'type' => 'array',
        'expansion' => ExpansionEnum::class,
        'age' => AgeEnum::class,
    ];

    public function scopeFilter(Builder $query)
    {
        return app(Pipeline::class)
            ->send($query)
            ->through([
                new \Modules\Core\Models\Filters\ScopeFilter('search'),
                new \Modules\Core\Models\Filters\Sort,
            ])
            ->thenReturn();
    }

    public function scopeSearch(Builder $query, string $keyword)
    {
        return $query->where(function (Builder $query)  use ($keyword) {
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
