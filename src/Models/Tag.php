<?php

namespace Informate\Models;

use App\Contants\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection as DbCollection;
use Illuminate\Database\Eloquent\Collection;
use Muleta\Traits\Models\HasSlug;
use Muleta\Utils\Interfaces\Sortable;

use Population\Manipule\Builders\TagBuilder;
use Population\Manipule\Entities\TagEntity;
use Siravel\Models\Blog\Post;
use Pedreiro\Models\Base;
use Muleta\Traits\Models\SortableTrait;
use Translation\Traits\HasTranslations;
use Watson\Validating\ValidatingTrait;

/**
 * Class Tag.
 *
 * @property int id
 * @property string value
 * @property Collection posts
 * @package  App\Models
 */
class Tag extends Base implements Sortable
{
    use ValidatingTrait;
    use HasTranslations, HasSlug, SortableTrait;

    public $translatable = ['name', 'code'];

    public $guarded = [];

    public static $classeBuilder = TagBuilder::class;
    
    /**
     * @inheritdoc
     */
    public $timestamps = false;

    /**
     * @inheritdoc
     */
    protected $fillable = [
        'value',
    ];

    /**
     * @inheritdoc
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(
            function (self $tag) {
                $tag->posts()->detach();
            }
        );
    }

    /**
     * @inheritdoc
     */
    public function newEloquentBuilder($query): TagBuilder
    {
        return new TagBuilder($query);
    }

    /**
     * @inheritdoc
     */
    public function newQuery(): TagBuilder
    {
        return parent::newQuery();
    }

    // @todo Carregar Modelo Post para Blog
    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    //  */
    // public function posts()
    // {
    //     return $this->belongsToMany(Post::class, Tables::TABLE_POSTS_TAGS);
    // }

    /**
     * Setter for the 'value' attribute.
     *
     * @param  string $value
     * @return $this
     */
    public function setValueAttribute(string $value)
    {
        $this->attributes['value'] = trim(str_replace(' ', '_', strtolower($value)));

        return $this;
    }

    /**
     * @return TagEntity
     */
    public function toEntity(): TagEntity
    {
        return new TagEntity(
            [
            'id' => $this->id,
            'value' => $this->value,
            ]
        );
    }

    public function scopeWithType(Builder $query, string $type = null): Builder
    {
        if (is_null($type)) {
            return $query;
        }

        return $query->where('type', $type)->ordered();
    }

    public function scopeContaining(Builder $query, string $name, $locale = null): Builder
    {
        $locale = $locale ?? app()->getLocale();

        $locale = '"'.$locale.'"';

        return $query->whereRaw("LOWER(JSON_EXTRACT(name, '$.".$locale."')) like ?", ['"%'.mb_strtolower($name).'%"']);
    }

    /**
     * @param string|array|\ArrayAccess $values
     * @param string|null               $type
     * @param string|null               $locale
     *
     * @return \App\Models\Tag|static
     */
    public static function findOrCreate($values, string $type = null, string $locale = null)
    {
        $tags = collect($values)->map(
            function ($value) use ($type, $locale) {
                if ($value instanceof self) {
                    return $value;
                }

                return static::findOrCreateFromString($value, $type, $locale);
            }
        );

        return is_string($values) ? $tags->first() : $tags;
    }

    public static function getWithType(string $type): DbCollection
    {
        return static::withType($type)->ordered()->get();
    }

    public static function findFromString(string $name, string $type = null, string $locale = null)
    {
        $locale = $locale ?? app()->getLocale();

        return static::query()
            ->where("name->{$locale}", $name)
            ->where('type', $type)
            ->first();
    }

    public static function findFromStringOfAnyType(string $name, string $locale = null)
    {
        $locale = $locale ?? app()->getLocale();

        return static::query()
            ->where("name->{$locale}", $name)
            ->first();
    }

    protected static function findOrCreateFromString(string $name, string $type = null, string $locale = null): self
    {
        $locale = $locale ?? app()->getLocale();

        $tag = static::findFromString($name, $type, $locale);

        if (! $tag) {
            $tag = static::create(
                [
                'name' => [$locale => $name],
                'type' => $type,
                ]
            );
        }

        return $tag;
    }

    public function setAttribute($key, $value)
    {
        if ($key === 'name' && ! is_array($value)) {
            return $this->setTranslation($key, app()->getLocale(), $value);
        }

        return parent::setAttribute($key, $value);
    }

    /**
     * @todo peguei de um projeto, ver se ta faltando algo e entao deletar
     */

    // use SortableTrait, Translatable, HasSlug;

    // public $translatable = ['name', 'code'];

    // public $guarded = [];

    
    // /**
    //  * @inheritdoc
    //  */
    // public $timestamps = false;

    // /**
    //  * @inheritdoc
    //  */
    // protected $fillable = [
    //     'value',
    // ];

    // /**
    //  * @inheritdoc
    //  */
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function (self $tag) {
    //         $tag->posts()->detach();
    //     });
    // }

    // /**
    //  * @inheritdoc
    //  */
    // public function newEloquentBuilder($query): TagBuilder
    // {
    //     return new TagBuilder($query);
    // }

    // /**
    //  * @inheritdoc
    //  */
    // public function newQuery(): TagBuilder
    // {
    //     return parent::newQuery();
    // }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    //  */
    // public function posts()
    // {
    //     return $this->belongsToMany(Post::class, Tables::TABLE_POSTS_TAGS);
    // }

    // /**
    //  * Setter for the 'value' attribute.
    //  *
    //  * @param string $value
    //  * @return $this
    //  */
    // public function setValueAttribute(string $value)
    // {
    //     $this->attributes['value'] = trim(str_replace(' ', '_', strtolower($value)));

    //     return $this;
    // }

    // /**
    //  * @return TagEntity
    //  */
    // public function toEntity(): TagEntity
    // {
    //     return new TagEntity([
    //         'id' => $this->id,
    //         'value' => $this->value,
    //     ]);
    // }

    // public function scopeWithType(Builder $query, string $type = null): Builder
    // {
    //     if (is_null($type)) {
    //         return $query;
    //     }

    //     return $query->where('type', $type)->ordered();
    // }

    // public function scopeContaining(Builder $query, string $name, $locale = null): Builder
    // {
    //     $locale = $locale ?? app()->getLocale();

    //     $locale = '"'.$locale.'"';

    //     return $query->whereRaw("LOWER(JSON_EXTRACT(name, '$.".$locale."')) like ?", ['"%'.mb_strtolower($name).'%"']);
    // }

    // /**
    //  * @param string|array|\ArrayAccess $values
    //  * @param string|null $type
    //  * @param string|null $locale
    //  *
    //  * @return \App\Models\Tag|static
    //  */
    // public static function findOrCreate($values, string $type = null, string $locale = null)
    // {
    //     $tags = collect($values)->map(function ($value) use ($type, $locale) {
    //         if ($value instanceof self) {
    //             return $value;
    //         }

    //         return static::findOrCreateFromString($value, $type, $locale);
    //     });

    //     return is_string($values) ? $tags->first() : $tags;
    // }

    // public static function getWithType(string $type): DbCollection
    // {
    //     return static::withType($type)->ordered()->get();
    // }

    // public static function findFromString(string $name, string $type = null, string $locale = null)
    // {
    //     $locale = $locale ?? app()->getLocale();

    //     return static::query()
    //         ->where("name->{$locale}", $name)
    //         ->where('type', $type)
    //         ->first();
    // }

    // public static function findFromStringOfAnyType(string $name, string $locale = null)
    // {
    //     $locale = $locale ?? app()->getLocale();

    //     return static::query()
    //         ->where("name->{$locale}", $name)
    //         ->first();
    // }

    // protected static function findOrCreateFromString(string $name, string $type = null, string $locale = null): self
    // {
    //     $locale = $locale ?? app()->getLocale();

    //     $tag = static::findFromString($name, $type, $locale);

    //     if (! $tag) {
    //         $tag = static::create([
    //             'name' => [$locale => $name],
    //             'type' => $type,
    //         ]);
    //     }

    //     return $tag;
    // }

    // public function setAttribute($key, $value)
    // {
    //     if ($key === 'name' && ! is_array($value)) {
    //         return $this->setTranslation($key, app()->getLocale(), $value);
    //     }

    //     return parent::setAttribute($key, $value);
    // }
}
