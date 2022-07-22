<?php

namespace Modules\Work\Models;

use Modules\Core\Models\Pivot;

class ProjectCategoryPivot extends Pivot
{
    protected $table = 'work__project_category';

    protected static $pivotKeys = [
        Project::class => 'project_id',
        ProjectCategory::class => 'category_id',
    ];
}
