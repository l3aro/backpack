<?php

namespace Modules\Blog\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Pipeline\Pipeline;
use Modules\Core\Models\Scopes\PriorityScope;

class Category extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::addGlobalScope(new PriorityScope);
    }

    protected $table = "blog__categories";

    protected $guarded = ['id'];

    protected $attributes = [
        'is_published' => true,
    ];

    protected static function newFactory()
    {
        return \Modules\Blog\Database\factories\CategoryFactory::new();
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'blog__post_category', 'category_id', 'post_id');
    }

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

    public function scopeSearch(Builder $query, $search)
    {
        if (!$search) {
            return $query;
        }
        return $query->where(function (Builder $query) use ($search) {
            $query->where('id', $search)
                ->orWhere('name', 'like', "%{$search}%")
                ->orWhere('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        });
    }

    public function scopePublished(Builder $query)
    {
        return $query->where('is_published', true);
    }
}
