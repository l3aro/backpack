<?php

namespace Modules\Portfolio\Http\Controllers;

use Illuminate\Routing\Controller;

class LocaleController extends Controller
{
    public function __invoke($locale)
    {
        $previousRequest = $this->getPreviousRequest();
        $segments = $previousRequest->segments();
        if (! array_key_exists($locale, config('app.locales'))) {
            return back();
        }
        $segments[0] = $locale;

        return redirect()->to($this->buildNewRoute($segments));
    }

    protected function getPreviousRequest()
    {
        return request()->create(url()->previous());
    }

    protected function buildNewRoute($segments)
    {
        return implode('/', $segments->toArray());
    }
}
