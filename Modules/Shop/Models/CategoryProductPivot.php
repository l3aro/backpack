<?php

namespace Modules\Shop\Models;

use Modules\Core\Models\Pivot;

class CategoryProductPivot extends Pivot
{
    protected $table = 'shop__category_product';

    protected static $pivotKeys = [
        Product::class => 'product_id',
        Category::class => 'category_id',
    ];
}
