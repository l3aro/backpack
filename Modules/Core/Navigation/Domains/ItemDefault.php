<?php

namespace Modules\Core\Navigation\Domains;

use Modules\Core\Navigation\Item;
use Modules\Core\Navigation\Section;

class ItemDefault implements Item
{
    public function __construct(
        private string $title = '',
        private string $icon = '',
        private string $url = '',
        private array $children = [],
        private bool $active = false,
        private bool $shouldOpenNewTab = false
    ) {
    }

    public function title(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function icon(): string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): static
    {
        $this->icon = $icon;

        return $this;
    }

    public function url(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function children(): array
    {
        return $this->children;
    }

    public function setChildren(callable $callback): static
    {
        $this->children = $callback(app(Section::class))->toArray();

        return $this;
    }

    public function hasChildren(): bool
    {
        return count($this->children) ? true : false;
    }

    public function active(): bool
    {
        return $this->active;
    }

    public function activeWhen(callable $callback): static
    {
        $this->active = $callback();

        return $this;
    }

    public function shouldOpenNewTab(): bool
    {
        return $this->shouldOpenNewTab;
    }

    public function setOpenNewTab(bool $condition): static
    {
        $this->shouldOpenNewTab = $condition;

        return $this;
    }
}
