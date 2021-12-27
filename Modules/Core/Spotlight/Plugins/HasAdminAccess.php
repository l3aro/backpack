<?php

namespace Modules\Core\Spotlight\Plugins;

use Illuminate\Http\Request;

trait HasAdminAccess
{
    public function shouldBeShown(Request $request): bool
    {
        logger()->debug('Checking if spotlight should be shown');
        if (!$request->user('admin')) {
            return false;
        }

        return $request->is('admin/*') || $request->is('admin');
    }
}
