<?php

namespace Modules\Core\Navigation;

interface Item
{
    public function title(): string;

    public function setTitle(string $title): static;

    public function icon(): string;

    public function setIcon(string $icon): static;

    public function url(): string;

    public function setUrl(string $url): static;

    public function children(): array;

    public function setChildren(callable $callback): static;

    public function hasChildren(): bool;

    public function active(): bool;

    public function activeWhen(callable $callback): static;

    public function shouldOpenNewTab(): bool;

    public function setOpenNewTab(bool $condition): static;
}
