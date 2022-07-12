<?php

namespace Modules\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasTranslations;

    const UPLOAD_DISK = 'public';

    protected $table = 'core__settings';

    protected $fillable = [
        'key',
        'value',
        'locked',
    ];

    public $translatable = ['value'];

    protected $casts = [
        'value' => 'json',
    ];

    public static function boot()
    {
        parent::boot();

        $flushCache = function ($setting) {
            $locale = app()->getLocale();
            Cache::forget("$locale-setting.".$setting->key);
            Cache::rememberForever("$locale-setting.".$setting->key, fn () => $setting->value);
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
