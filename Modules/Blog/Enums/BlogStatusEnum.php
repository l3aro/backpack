<?php

namespace Modules\Blog\Enums;

use Modules\Core\Enums\BaseEnum;

final class BlogStatusEnum extends BaseEnum
{
    const DRAFT = 'draft';
    const PUBLISHED = 'published';
    const SCHEDULED = 'scheduled';

    public static function getLabels(): array
    {
        return [
            self::DRAFT => __('Draft'),
            self::PUBLISHED => __('Published'),
            self::SCHEDULED => __('Scheduled'),
        ];
    }
}
