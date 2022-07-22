<?php

namespace Modules\Core\Models;

use Illuminate\Database\Eloquent\Relations\Pivot as RelationsPivot;

class Pivot extends RelationsPivot
{
    protected static $pivotKeys;

    public static function getPivotKeyFor($class)
    {
        return static::$pivotKeys[$class] ?? null;
    }
}
