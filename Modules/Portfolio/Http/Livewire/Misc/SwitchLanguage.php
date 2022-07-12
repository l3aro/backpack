<?php

namespace Modules\Portfolio\Http\Livewire\Misc;

use Livewire\Component;
use Modules\Blog\Models\Post;
use RalphJSmit\Livewire\Urls\Facades\Url;

class SwitchLanguage extends Component
{
    const SCHEME_DIVIDER = '://';

    public array $listLocale = [];

    public function mount()
    {
        $this->listLocale = config('app.locales', []);
    }

    public function render()
    {
        return view('portfolio::livewire.misc.switch-language');
    }

    public function getShouldShowSwitcherProperty()
    {
        return count($this->listLocale) ? true : false;
    }

    public function setLocale($locale)
    {
        if (! array_key_exists($locale, $this->listLocale)) {
            return;
        }
        $newUrl = $this->buildNewUrl($locale);
        if ($newUrl === null) {
            return;
        }

        return redirect()->to($newUrl);
    }

    protected function buildNewUrl($locale)
    {
        $currentUrl = Url::current();
        $segments = str($currentUrl)->after(static::SCHEME_DIVIDER)->explode('/');
        $currentLocale = $segments[1];
        $segments[1] = $locale;
        if ($currentLocale === $locale) {
            return null;
        }
        if (Url::currentRoute() === 'portfolio.blogs.show') {
            $slug = $this->findCorrespondingSlug($currentLocale, $locale, $segments->pop());
            $segments->push($slug);
        }

        $urlScheme = str($currentUrl)->before(static::SCHEME_DIVIDER)->append(static::SCHEME_DIVIDER);

        return $urlScheme->append($segments->implode('/'));
    }

    protected function findCorrespondingSlug($currentLocale, $targetLocale, $slug)
    {
        $post = Post::where('slug->'.$currentLocale, $slug)->firstOrFail();

        return $post->getTranslation('slug', $targetLocale);
    }
}
