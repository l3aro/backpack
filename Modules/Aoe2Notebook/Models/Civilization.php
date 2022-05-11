<?php

namespace Modules\Aoe2Notebook\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;
use Modules\Aoe2Notebook\Enums\ExpansionEnum;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Civilization extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = "aoe2notebook_civilizations";

    protected $guarded = ['id'];

    protected $casts = [
        'expansion' => ExpansionEnum::class,
    ];

    protected $attributes = [
        'name' => '',
        'expansion' => ExpansionEnum::DEFINITIVE_EDITION,
        'army_type' => '',
        'team_bonus' => '',
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
}