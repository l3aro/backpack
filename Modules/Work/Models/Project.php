<?php

namespace Modules\Work\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'work__projects';

    protected $fillable = [];

    public function categories()
    {
        return $this->belongsToMany(
            ProjectCategory::class,
            ProjectCategoryPivot::class,
            ProjectCategoryPivot::getPivotKeyFor(self::class),
            ProjectCategoryPivot::getPivotKeyFor(ProjectCategory::class),
        );
    }
}
