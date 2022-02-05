<?php

namespace Modules\Portfolio\Enums;

use Modules\Core\Enums\BaseEnum;

final class AsideEnum
{
    const TYPE_ITEM = 'item';
    const TYPE_DIVIDER = 'divider';

    const PROPERTY_TITLE = 'title';
    const PROPERTY_LINK = 'link';
    const PROPERTY_ICON = 'icon';
    const PROPERTY_ACTIVE = 'active';
    const PROPERTY_TYPE = 'type';

    private $items = [];

    public function __construct()
    {
        $this->items = [
            [
                self::PROPERTY_TYPE => self::TYPE_ITEM,
                self::PROPERTY_TITLE => __('Home'),
                self::PROPERTY_LINK => route('portfolio.home'),
                self::PROPERTY_ACTIVE => request()->routeIs('portfolio.home'),
            ],
            [
                self::PROPERTY_TYPE => self::TYPE_ITEM,
                self::PROPERTY_TITLE => __('Blog'),
                self::PROPERTY_LINK => route('portfolio.blogs.index'),
                self::PROPERTY_ACTIVE => request()->routeIs('portfolio.blogs.*'),
            ],
        ];
    }

    public function getItems()
    {
        return $this->items;
    }
}
