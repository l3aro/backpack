<?php

namespace Modules\Work\Models;

use Baro\PipelineQueryCollection\Concerns\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Models\Plugins\Orderable;
use Spatie\Translatable\HasTranslations;

class Project extends Model
{
    use HasTranslations;
    use Filterable;
    use Orderable;

    protected $table = 'work__projects';

    protected $guarded = ['id'];

    public $translatable = ['title', 'slug', 'description'];

    protected $attributes = [
        'title' => null,
        'slug' => null,
        'description' => null,
    ];

    public function getFilters()
    {
        return [
            new \Baro\PipelineQueryCollection\ScopeFilter('search'),
        ];
    }

    public function scopeSearch(Builder $query, $search)
    {
        $locale = app()->getLocale();

        return $query->where(
            fn (Builder $query) => $query
                ->whereId($search)
                ->orWhere("name->$locale", 'like', "%$search%")
        );
    }

    public function categories()
    {
        return $this->belongsToMany(
            ProjectCategory::class,
            ProjectCategoryPivot::class,
            ProjectCategoryPivot::getPivotKeyFor(self::class),
            ProjectCategoryPivot::getPivotKeyFor(ProjectCategory::class),
        );
    }
}
