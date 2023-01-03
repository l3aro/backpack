<?php

namespace Modules\Work\Http\Controllers;

use Baro\PipelineQueryCollection\ExactFilter;
use Baro\PipelineQueryCollection\ScopeFilter;
use Illuminate\Routing\Controller;
use Modules\Work\Models\Project;
use Modules\Work\Models\ProjectCategory;

class SearchController extends Controller
{
    public function project()
    {
        return response()->json(
            Project::query()
                ->filter([
                    (new ScopeFilter('search'))->detectBy(''),
                    (new ExactFilter('selected'))->detectBy('')->filterOn('id'),
                ])
                ->get()
                ->transform(fn ($record) => [
                    'id' => $record->id,
                    'title' => $record->title,
                ])
        );
    }

    public function projectCategory()
    {
        return response()->json(
            ProjectCategory::query()
                ->filter([
                    (new ScopeFilter('search'))->detectBy(''),
                    (new ExactFilter('selected'))->detectBy('')->filterOn('id'),
                ])
                ->get()
                ->transform(fn ($record) => [
                    'id' => $record->id,
                    'title' => $record->title,
                ])
        );
    }
}
