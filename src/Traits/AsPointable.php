<?php

namespace Informate\Traits;

use Illuminate\Support\Facades\Log;
use Informate\Models\Model;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

trait AsPointable
{
    use HasMediaTrait;

    public static function bootHasPhoto()                                                                                                                                                             
    {

        static::deleting(function (self $user) {
            optional($user->photos)->each(function (Photo $photo) {
                $photo->delete();
            });
        });
    }
    
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(50)
            ->height(50);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this-->getMedia();
    }
}