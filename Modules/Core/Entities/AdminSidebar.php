<?php

namespace Modules\Core\Entities;

class AdminSidebar
{
    const TYPE_ITEM = 'item';
    const TYPE_DIVIDER = 'divider';

    const PROPERTY_TITLE = 'title';
    const PROPERTY_LINK = 'link';
    const PROPERTY_ICON = 'icon';
    const PROPERTY_ACTIVE = 'active';
    const PROPERTY_TYPE = 'type';

    protected $items = [];

    public function __construct()
    {
        $this->items = [
            [
                self::PROPERTY_TYPE => self::TYPE_ITEM,
                self::PROPERTY_TITLE => __('Dashboard'),
                self::PROPERTY_LINK => route('admin.dashboard'),
                self::PROPERTY_ICON => 'heroicon-o-database',
                self::PROPERTY_ACTIVE => request()->routeIs('admin.dashboard'),
            ],
            [
                self::PROPERTY_TYPE => self::TYPE_ITEM,
                self::PROPERTY_TITLE => __('Home'),
                self::PROPERTY_LINK => route('home'),
                self::PROPERTY_ICON => 'heroicon-o-home',
                self::PROPERTY_ACTIVE => request()->routeIs('home'),
            ],
            [
                self::PROPERTY_TYPE => self::TYPE_DIVIDER,
                self::PROPERTY_TITLE => __('Resources'),
            ],
            [
                self::PROPERTY_TYPE => self::TYPE_ITEM,
                self::PROPERTY_TITLE => __('Projects'),
                self::PROPERTY_LINK => route('admin.projects.index'),
                self::PROPERTY_ICON => 'heroicon-o-camera',
                self::PROPERTY_ACTIVE => request()->routeIs('admin.projects.*'),
            ],
            [
                self::PROPERTY_TYPE => self::TYPE_ITEM,
                self::PROPERTY_TITLE => __('Contact'),
                self::PROPERTY_LINK => route('admin.contacts.index'),
                self::PROPERTY_ICON => 'heroicon-o-mail',
                self::PROPERTY_ACTIVE => request()->routeIs('admin.contacts.*'),
            ],
            [
                self::PROPERTY_TYPE => self::TYPE_ITEM,
                self::PROPERTY_TITLE => __('Users'),
                self::PROPERTY_LINK => route('admin.users.index'),
                self::PROPERTY_ICON => 'heroicon-o-user',
                self::PROPERTY_ACTIVE => request()->routeIs('admin.users.*'),
            ],
            [
                self::PROPERTY_TYPE => self::TYPE_DIVIDER,
                self::PROPERTY_TITLE => __('Settings'),
            ],
            [
                self::PROPERTY_TYPE => self::TYPE_ITEM,
                self::PROPERTY_TITLE => __('General'),
                self::PROPERTY_LINK => route('admin.settings.general'),
                self::PROPERTY_ICON => 'heroicon-s-cog',
                self::PROPERTY_ACTIVE => request()->routeIs('admin.settings.general'),
            ],
            [
                self::PROPERTY_TYPE => self::TYPE_ITEM,
                self::PROPERTY_TITLE => __('Home'),
                self::PROPERTY_LINK => route('admin.settings.home'),
                self::PROPERTY_ICON => 'heroicon-s-home',
                self::PROPERTY_ACTIVE => request()->routeIs('admin.settings.home'),
            ],
            [
                self::PROPERTY_TYPE => self::TYPE_ITEM,
                self::PROPERTY_TITLE => __('About'),
                self::PROPERTY_LINK => route('admin.settings.about'),
                self::PROPERTY_ICON => 'heroicon-s-user-circle',
                self::PROPERTY_ACTIVE => request()->routeIs('admin.settings.about'),
            ],
        ];
    }

    public function getItems()
    {
        return $this->items;
    }
}
