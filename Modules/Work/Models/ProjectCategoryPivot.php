<?php

namespace Modules\Work\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectCategoryPivot extends Pivot
{
    protected $table = 'work__project_category';

    protected $pivotKeys = [
        Project::class => 'project_id',
        ProjectCategory::class => 'category_id',
    ];
}
