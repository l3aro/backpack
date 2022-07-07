<?php

namespace App\Services\Eloquent;

use App\Services\Contracts\MarkdownTableService;

class MarkdownTableServiceEloquent implements MarkdownTableService
{
    public function __construct(
        protected $headers = [],
        protected $rows = [],
        protected $alignments = []
    ) {
        //
    }

    public static function make(array $data, array $headers = [], array $alignments = []): self
    {
        return new self($data, $headers, $alignments);
    }

    public function headers(array $headers): self
    {
        $this->headers = $headers;

        return $this;
    }

    public function rows(array $rows): self
    {
        $this->rows = $rows;

        return $this;
    }

    public function row(array $row): self
    {
        $this->rows[] = $row;

        return $this;
    }

    public function render(): string
    {
        $widths = $this->calculateWidths();

        $table = $this->renderHeaders($widths);
        $table .= $this->renderRows($widths);

        return $table;
    }

    protected function renderHeaders($widths)
    {
        if (empty($this->headers)) {
            return '';
        }

        $result = '| ';
        for ($i = 0; $i < count($this->headers); $i++) {
            $result .= $this->renderCell($this->headers[$i], $this->columnAlign($i), $widths[$i]).' | ';
        }

        $result = rtrim($result, ' ').PHP_EOL.$this->renderAlignments($widths).PHP_EOL;

        return $result;
    }

    protected function renderRows($widths)
    {
        $result = '';
        foreach ($this->rows as $row) {
            $result .= '| ';
            for ($i = 0; $i < count($row); $i++) {
                $result .= $this->renderCell($row[$i], $this->columnAlign($i), $widths[$i]).' | ';
            }
            $result = rtrim($result, ' ').PHP_EOL;
        }

        return $result;
    }

    protected function renderCell($contents, $alignment, $width)
    {
        switch ($alignment) {
            case 'L':
                $type = STR_PAD_RIGHT;
                break;
            case 'C':
                $type = STR_PAD_BOTH;
                break;
            case 'R':
                $type = STR_PAD_LEFT;
                break;
        }

        return str_pad($contents, $width, ' ', $type);
    }

    protected function calculateWidths()
    {
        $widths = [];

        foreach (array_merge([$this->headers], $this->rows) as $row) {
            for ($i = 0; $i < count($row); $i++) {
                $iWidth = strlen((string) $row[$i]);
                if ((! array_key_exists($i, $widths)) || $iWidth > $widths[$i]) {
                    $widths[$i] = $iWidth;
                }
            }
        }

        // all columns must be at least 3 wide for the markdown to work
        $widths = array_map(function ($width) {
            return $width >= 3 ? $width : 3;
        }, $widths);

        return $widths;
    }

    protected function renderAlignments($widths)
    {
        $row = '|';
        for ($i = 0; $i < count($widths); $i++) {
            $cell = str_repeat('-', $widths[$i] + 2);
            $align = $this->columnAlign($i);

            if ($align == 'C') {
                $cell = ':'.substr($cell, 2).':';
            }

            if ($align == 'R') {
                $cell = substr($cell, 1).':';
            }

            $row .= $cell.'|';
        }

        return $row;
    }

    protected function columnAlign($columnNumber)
    {
        $valid = ['L', 'C', 'R'];

        if (array_key_exists($columnNumber, $this->alignments) && in_array($this->alignments[$columnNumber], $valid)) {
            return $this->alignments[$columnNumber];
        }

        return 'L';
    }
}
