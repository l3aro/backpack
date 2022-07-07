<?php

namespace Modules\Blog\Models;

use Baro\PipelineQueryCollection\Concerns\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Core\Models\Plugins\Orderable;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory;
    use HasTranslations;
    use Orderable;
    use Filterable;

    protected $table = "blog__categories";
    public $translatable = ['title', 'slug', 'description', 'meta_title', 'meta_description', 'meta_keyword'];

    protected $guarded = ['id'];

    protected $attributes = [
        'title' => null,
        'slug' => null,
        'description' => null,
        'is_published' => true,
        'meta_title' => null,
        'meta_description' => null,
        'meta_keyword' => null,
    ];

    protected static function newFactory()
    {
        return \Modules\Blog\Database\factories\CategoryFactory::new();
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'blog__post_category', 'category_id', 'post_id');
    }

    public function getFilters()
    {
        return [
            new \Baro\PipelineQueryCollection\ScopeFilter('search'),
            new \Baro\PipelineQueryCollection\Sort,
        ];
    }

    public function scopeSearch(Builder $query, $search)
    {
        $locale = app()->getLocale();
        return $query->where(
            fn (Builder $query) => $query
                ->where('id', $search)
                ->orWhere("title->$locale", 'like', "%{$search}%")
                ->orWhere("description->$locale", 'like', "%{$search}%")
        );
    }

    public function scopePublished(Builder $query)
    {
        return $query->where('is_published', true);
    }
}
