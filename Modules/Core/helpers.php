<?php

use Illuminate\Support\Facades\Cache;
use Modules\Core\Models\Setting;

if (! function_exists('setting')) {
    function setting($key, $default = null)
    {
        $locale = app()->getLocale();

        return Cache::rememberForever("$locale-setting.".$key, fn () => Setting::firstWhere('key', $key)?->translate('value', $locale)) ?: $default;
    }
}

if (! function_exists('isEmptyOrNull')) {
    function isEmptyOrNull($value): bool
    {
        if (! isset($value)) {
            return true;
        }
        if (empty($value)) {
            return true;
        }

        return false;
    }
}
