<?php

namespace Modules\Shop\Models;

use Baro\PipelineQueryCollection\Concerns\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Models\Plugins\Orderable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasTranslations;
    use Filterable;
    use Orderable;
    use InteractsWithMedia;

    protected $table = 'shop__products';

    protected $guarded = ['id'];

    public $translatable = ['title', 'slug', 'description'];

    protected $attributes = [
        'type' => null,
        'title' => null,
        'description' => null,
        'slug' => null,
        'sku' => null,
        'barcode' => null,
        'is_in_stock' => false,
        'is_taxable' => false,
        'quantity' => 0,
        'price' => 0,
        'cost_price' => 0,
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
            Category::class,
            CategoryProductPivot::class,
            CategoryProductPivot::getPivotKeyFor(self::class),
            CategoryProductPivot::getPivotKeyFor(Product::class)
        );
    }
}
