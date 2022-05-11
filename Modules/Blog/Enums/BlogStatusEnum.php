<?php

namespace Modules\Blog\Enums;

use Modules\Core\Enums\Concerns\DefineEnumLabel;
use Modules\Core\Enums\Concerns\EnumHasLabel;

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

    public function description(): string
    {
        if (!isset($this->published_at)) {
            return 'On Drafting';
        }

        if ($this->published_at->isFuture()) {
            return 'Post is scheduled for publishing on ' . $this->published_at->format('F j, Y H:i');
        }

        return 'Published on ' . $this->published_at->format('F j, Y H:i');
    }
}
