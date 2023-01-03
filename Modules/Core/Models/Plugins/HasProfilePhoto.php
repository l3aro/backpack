<?php

namespace Modules\Core\Models\Plugins;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Cache;
use Spatie\MediaLibrary\InteractsWithMedia;

trait HasProfilePhoto
{
    use InteractsWithMedia;

    /**
     * Update the user's profile photo.
     *
     * @param  \Illuminate\Http\UploadedFile  $photo
     * @return void
     */
    public function updateProfilePhoto(UploadedFile $photo)
    {
        $this->addMedia($photo)->toMediaCollection('avatar');

        Cache::forget($this->getAvatarCacheKey());
    }

    protected function getAvatarCacheKey(): string
    {
        return 'user_avatar'.$this->id;
    }

    /**
     * Get the URL to the user's profile photo.
     *
     * @return string
     */
    public function getProfilePhotoUrlAttribute()
    {
        return Cache::remember(
            $this->getAvatarCacheKey(),
            60 * 60 * 24,
            fn () => $this->getFirstMediaUrl('avatar', 'thumb')
        );
    }

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function defaultProfilePhotoUrl()
    {
        return 'https://ui-avatars.com/api/?name='.urlencode($this->name).'&color=7F9CF5&background=EBF4FF';
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('avatar')
            ->useFallbackUrl($this->defaultProfilePhotoUrl())
            ->singleFile()
            ->registerMediaConversions(function () {
                $this
                    ->addMediaConversion('thumb')
                    ->crop('crop-center', 400, 400);
            });
    }
}
