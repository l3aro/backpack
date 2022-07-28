<?php

namespace Modules\Work\Models;

use Baro\PipelineQueryCollection\Concerns\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Models\Plugins\Orderable;
use Spatie\Translatable\HasTranslations;

class ProjectCategory extends Model
{
    use HasTranslations;
    use Filterable;
    use Orderable;

    protected $table = 'work__project_categories';

    protected $guarded = ['id'];

    public $translatable = ['title', 'slug'];

    protected $attributes = [
        'title' => null,
        'slug' => null,
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
                ->orWhere("title->$locale", 'like', "%$search%")
        );
    }

    public function projects()
    {
        return $this->belongsToMany(
            Project::class,
            ProjectCategoryPivot::class,
            ProjectCategoryPivot::getPivotKeyFor(self::class),
            ProjectCategoryPivot::getPivotKeyFor(Project::class),
        );
    }
}
