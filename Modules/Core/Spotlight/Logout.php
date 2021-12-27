<?php

namespace Modules\Core\Spotlight;

use LivewireUI\Spotlight\Spotlight;
use LivewireUI\Spotlight\SpotlightCommand;
use Modules\Core\Providers\RouteServiceProvider;
use Modules\Core\Services\Contracts\AuthenticationService;
use Modules\Core\Spotlight\Plugins\HasAdminAccess;

class Logout extends SpotlightCommand
{
    use HasAdminAccess;

    protected string $name = 'Logout';

    protected string $description = 'Logout out of your admin account';

    public function execute(Spotlight $spotlight, AuthenticationService $authenticationService): void
    {
        $authenticationService->setGuard('admin')->logout();
        $spotlight->redirect(RouteServiceProvider::ADMIN_ROOT);
    }
}
