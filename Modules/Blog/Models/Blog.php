<?php

namespace Modules\Blog\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Pipeline\Pipeline;
use Modules\Blog\Enums\BlogStatusEnum;
use Modules\Core\Models\Scopes\PriorityScope;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Tags\HasTags;

class Blog extends Model implements HasMedia
{
    use HasFactory;
    use HasTags;
    use InteractsWithMedia;

    protected static function booted()
    {
        static::addGlobalScope(new PriorityScope);
    }

    protected $guarded = ['id'];

    protected $casts = [
        'published_at' => 'datetime:Y-m-d H:i',
    ];

    public function categories()
    {
        return $this->belongsToMany(BlogCategory::class, 'blog_category', 'blog_id', 'category_id');
    }

    public function scopePublished(Builder $query)
    {
        return $query->where('published_at', '<=', now());
    }

    public function scopeDraft(Builder $query)
    {
        return $query->whereNull('published_at');
    }

    public function scopeScheduled(Builder $query)
    {
        return $query->where('published_at', '>', now());
    }

    public function scopeFilter(Builder $query)
    {
        return app(Pipeline::class)
            ->send($query)
            ->through([
                new \Modules\Core\Models\Filters\ScopeFilter('search'),
                new \Modules\Core\Models\Filters\ScopeFilter('status'),
                new \Modules\Core\Models\Filters\ScopeFilter('tag'),
                new \Modules\Core\Models\Filters\DateFromFilter('published_at'),
                new \Modules\Core\Models\Filters\DateToFilter('published_at'),
                new \Modules\Core\Models\Filters\RelationFilter('categories', 'id'),
                new \Modules\Core\Models\Filters\RelationFilter('categories', 'slug'),
                new \Modules\Core\Models\Filters\Sort,
            ])
            ->thenReturn();
    }

    public function scopeSearch(Builder $query, string $keyword)
    {
        return $query->where(function (Builder $query)  use ($keyword) {
            $query->where('id', $keyword)
                ->orWhere('title', 'like', "%{$keyword}%")
                ->orWhere('description', 'like', "%{$keyword}%");
        });
    }

    public function scopeTag(Builder $query, string $tag)
    {
        return $query->withAnyTags([$tag], get_class());
    }

    public function scopeStatus(Builder $query, string $status)
    {
        if ($status === 'published') {
            return $query->published();
        }
        if ($status === 'draft') {
            return $query->draft();
        }
        if ($status === 'scheduled') {
            return $query->scheduled();
        }
        return $query;
    }

    public function nextPost(): ?self
    {
        return self::query()->published()
            ->where('published_at', '>', $this->published_at)
            ->first();
    }

    public function previousPost(): ?self
    {
        return self::query()->published()
            ->where('published_at', '<', $this->published_at)
            ->first();
    }

    public function getStatusAttribute()
    {
        if (!isset($this->published_at)) {
            return BlogStatusEnum::DRAFT;
        }

        if ($this->published_at->isFuture()) {
            return BlogStatusEnum::SCHEDULED;
        }

        return BlogStatusEnum::PUBLISHED;
    }

    public function getStatusTextAttribute()
    {
        if (!isset($this->published_at)) {
            return 'On Drafting';
        }

        if ($this->published_at->isFuture()) {
            return 'Post is scheduled for publishing on ' . $this->published_at->format('F j, Y H:i');
        }

        return 'Published on ' . $this->published_at->format('F j, Y H:i');
    }

    public function isDraft(): bool
    {
        return $this->status === BlogStatusEnum::DRAFT;
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')
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
