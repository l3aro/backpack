<?php

namespace App\Services\Contracts;

interface MarkdownTableService
{
    public static function make(array $data, array $headers = [], array $alignments = []): self;

    public function headers(array $headers): self;

    public function rows(array $rows): self;

    public function row(array $row): self;

    public function render(): string;
}
