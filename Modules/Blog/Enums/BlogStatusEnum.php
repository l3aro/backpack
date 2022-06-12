<?php

namespace Modules\Blog\Enums;

use Modules\Core\Enums\Concerns\DefineEnumLabel;
use Modules\Core\Enums\Contracts\EnumHasLabel;

enum BlogStatusEnum: string implements EnumHasLabel
{
    use DefineEnumLabel;

    case DRAFT = 'draft';
    case PUBLISHED = 'published';
    case SCHEDULED = 'scheduled';

    public function label(): string
    {
        return match ($this) {
            self::DRAFT => __('Draft'),
            self::PUBLISHED => __('Published'),
            self::SCHEDULED => __('Scheduled'),
        };
    }
}
