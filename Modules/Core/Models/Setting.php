<?php

namespace Modules\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    const UPLOAD_DISK = 'public';

    protected $table = 'core__settings';

    protected $fillable = [
        'key',
        'value',
        'locked',
    ];

    protected $casts = [
        'value' => 'json',
    ];

    public static function boot()
    {
        parent::boot();

        $flushCache = function ($setting) {
            Cache::forget('setting.'.$setting->key);
            Cache::rememberForever('setting.'.$setting->key, fn () => $setting->value);
        };

        static::saved($flushCache);
    }

    public function scopeLocked($query)
    {
        return $query->where('locked', true);
    }

    public function scopeUnlocked($query)
    {
        return $query->where('locked', false);
    }

    public function getValue()
    {
        return $this->value;
    }

    public static function uploadImage(UploadedFile $image)
    {
        $file = $image->store('media', static::UPLOAD_DISK);

        return Storage::disk(static::UPLOAD_DISK)->url($file);
    }
}
