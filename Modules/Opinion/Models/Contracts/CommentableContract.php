<?php

namespace Modules\Opinion\Models\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface CommentableContract
{
    public function comments(): MorphMany;
    public function mustBeApproved(): bool;
    /**
     * Get the value of the model's primary key.
     */
    public function getKey(): mixed;
}
