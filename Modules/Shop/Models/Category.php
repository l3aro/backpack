<?php

namespace Modules\Shop\Models;

use Baro\PipelineQueryCollection\Concerns\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Models\Plugins\Orderable;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory;
    use HasTranslations;
    use Filterable;
    use Orderable;

    protected $guarded = ['id'];

    protected $table = 'shop__categories';

    protected $translatable = ['title', 'slug'];

    protected $attributes = [
        'title' => null,
        'slug' => null,
        'description' => null,
        'is_published' => true,
        'meta_title' => null,
        'meta_description' => null,
        'meta_keyword' => null,
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

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            CategoryProductPivot::class,
            CategoryProductPivot::getPivotKeyFor(self::class),
            CategoryProductPivot::getPivotKeyFor(Product::class),
        );
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public static function getSubCategories($parentId = 0, $processId = null)
    {
        return self::whereParentId($parentId)
            ->when($processId, fn (Builder $query) => $query->where('id', '<>', $processId))
            ->latest('priority')
            ->get()
            ->transform(function ($category) use ($processId) {
                $category->sub = self::getSubCategories($category->id, $processId);

                return $category;
            });
    }
}
