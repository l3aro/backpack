<?php

namespace Modules\Work\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    protected $table = 'work__project_categories';

    protected $guarded = [];

    public function projects()
    {
        return $this->belongsToMany(Project::class, ProjectCategoryPivot::class);
    }
}
