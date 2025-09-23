<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CameraAudit extends Model implements HasMedia
{
    use InteractsWithMedia, SoftDeletes;
    
    protected $guarded = [];

    protected $casts = [
        'observation' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('camera-audit-images')
            ->useDisk('camera-audit-images')
            ->acceptsMimeTypes(['image/jpeg', 'image/png'])
            ->registerMediaConversions(function (Media $media): void {
                $this
                    ->addMediaConversion('thumb')
                    ->width(40)
                    ->height(40);
            });
    }

    

}
