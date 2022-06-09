<?php

namespace Modules\Opinion\Models\Concerns;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Modules\Opinion\Models\Comment;
use Modules\Opinion\Models\Contracts\CommentableContract;

trait CanComment
{
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commented');
    }

    public function hasCommentsOn(CommentableContract $commentable): bool
    {
        return $this->comments()
            ->where([
                'commentable_type' => get_class($commentable),
                'commentable_id' => $commentable->getKey(),
            ])
            ->exists();
    }

    public function mustBeApproved(): bool
    {
        return false;
    }

    public function approveComment(Comment $comment): self
    {
        $comment->approve();

        return $this;
    }

    public function unapproveComment(Comment $comment): self
    {
        $comment->unapprove();

        return $this;
    }

    public function approveComments(): self
    {
        $this->comments()->each->approve();

        return $this;
    }

    public function unapproveComments(): self
    {
        $this->comments()->each->unapprove();

        return $this;
    }

    public function comment(CommentableContract $commentable, string $body): Comment
    {
        return $this->comments()->create([
            'body' => $body,
            'commented_type' => get_class(),
            'commented_id' => $this->getKey(),
            'approved' => $this->mustBeApproved() && ! $this->canCommentWithoutApproval() ? false : true,
        ]);
    }

    public function canCommentWithoutApproval(): bool
    {
        return false;
    }
}
