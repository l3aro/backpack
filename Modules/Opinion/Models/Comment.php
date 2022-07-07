<?php

namespace Modules\Opinion\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'is_approved' => 'boolean',
    ];

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    public function commented(): MorphTo
    {
        return $this->morphTo();
    }

    public function scopeApproved(Builder $query): Builder
    {
        return $query->where('is_approved', true);
    }

    public function scopeUnapproved(Builder $query): Builder
    {
        return $query->where('is_approved', false);
    }

    public function approve(): self
    {
        $this->is_approved = true;
        $this->save();

        return $this;
    }
}
