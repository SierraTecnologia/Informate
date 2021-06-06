<?php

namespace Informate\Models;

use Illuminate\Database\Eloquent\Model;
use Translation\Traits\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    use HasTranslations;

    protected $table = 'categories';
    // public $incrementing = false;
    // protected $casts = [
    //     'code' => 'string',
    // ];
    // protected $primaryKey = 'code';
    // protected $keyType = 'string'; 

    protected $translatable = ['slug', 'title'];

    protected $fillable = ['slug', 'title'];

    protected $dates = ['deleted_at'];

    protected $guarded  = array('id');
    

    public function parentId()
    {
        return $this->belongsTo(self::class);
    }


    /**
     * Returns a formatted post content entry,
     * this ensures that line breaks are returned.
     *
     * @return string
     */
    public function description()
    {
        return nl2br($this->description);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(
            function ($model) {

                if (empty($model->slug) && !empty($model->code)) {
                    $model->slug = $model->code;
                    unset($model->code);
                }
                if (empty($model->title)) {
                    $model->title = $model->slug;
                }
            }
        );
    }
    // /**
    //  * Get the author.
    //  *
    //  * @return User
    //  */
    // public function author()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    // /**
    //  * Get the slider's images.
    //  *
    //  * @return array
    //  */
    // public function articles()
    // {
    //     return $this->hasMany(Article::class, 'article_category_id');
    // }

    // /**
    //  * Get the slider's images.
    //  *
    //  * @return array
    //  */
    // public function posts()
    // {
    //     return $this->hasMany(Facilitador::modelClass('Post'))
    //         ->published()
    //         ->orderBy('created_at', 'DESC');
    // }

    // /**
    //  * Get the category's language.
    //  *
    //  * @return Language
    //  */
    // public function language()
    // {
    //     return $this->belongsTo(Language::class, 'language_code');
    // }
}
