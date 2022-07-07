<?php

namespace Modules\Blog\Models;

use Baro\PipelineQueryCollection\Concerns\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Enums\BlogStatusEnum;
use Modules\Core\Models\Plugins\Orderable;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Tags\HasTags;
use Spatie\Translatable\HasTranslations;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use HasTags;
    use InteractsWithMedia;
    use Orderable;
    use HasTranslations;
    use Filterable;

    protected $table = 'blog__posts';

    public $translatable = ['title', 'content', 'slug', 'description', 'meta_title', 'meta_description', 'meta_keyword'];

    protected $guarded = ['id'];

    protected $casts = [
        'published_at' => 'datetime:Y-m-d H:i',
    ];

    protected $attributes = [
        'title' => '',
        'description' => '',
        'content' => '',
        'published_at' => null,
        'slug' => '',
        'meta_title' => '',
        'meta_description' => '',
        'meta_keyword' => '',
    ];

    protected static function newFactory()
    {
        return \Modules\Blog\Database\factories\PostFactory::new();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'blog__post_category', 'post_id', 'category_id');
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

    public function getFilters()
    {
        return [
            new \Baro\PipelineQueryCollection\ScopeFilter('search'),
            new \Baro\PipelineQueryCollection\ScopeFilter('status'),
            new \Baro\PipelineQueryCollection\ScopeFilter('tag'),
            new \Baro\PipelineQueryCollection\DateFromFilter('published_at'),
            new \Baro\PipelineQueryCollection\DateToFilter('published_at'),
            new \Baro\PipelineQueryCollection\RelationFilter('categories', 'id'),
            (new \Baro\PipelineQueryCollection\ScopeFilter('categories_slug'))->filterOn('searchCategorySlug'),
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

    public function scopeSearchCategorySlug(Builder $query, $slug)
    {
        return $query->whereRelation('categories', 'slug', 'like', "%$slug%");
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

    protected function nextPost(): Attribute
    {
        return Attribute::make(
            get: fn () => self::query()
                ->published()
                ->where('published_at', '>', $this->published_at)
                ->orderBy('published_at', 'desc')
                ->select('id', 'title', 'slug')
                ->first(),
        );
    }

    protected function statusText(): Attribute
    {
        return Attribute::make(
            get: fn () => match (true) {
                ! isset($this->published_at) => 'On Drafting',
                $this->published_at->isFuture() => 'Post is scheduled for publishing on '.$this->published_at->format('F j, Y H:i'),
                default => 'Published on '.$this->published_at->format('F j, Y H:i'),
            },
        );
    }

    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn () => match (true) {
                ! isset($this->published_at) => BlogStatusEnum::DRAFT,
                $this->published_at->isFuture() => BlogStatusEnum::SCHEDULED,
                default => BlogStatusEnum::PUBLISHED,
            },
        );
    }

    protected function publishedAt(): Attribute
    {
        return Attribute::make(
            // get: fn () => $this->published_at ? $this->published_at->format('F j, Y H:i') : null,
            set: fn ($value) => empty($value) ? null : $value,
        );
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
