<?php

namespace Informate\Models;

use SiObjects\Manipule\Builders\CommentBuilder;
use App\Contants\Tables;
use App\Features\Photos\Entities\CommentEntity;
use Illuminate\Database\Eloquent\Collection;
use Support\Models\Base;

/**
 * Class Comment.
 *
 * @property int id
 * @property string value
 * @property Collection posts
 * @package App\Models
 */
class Comment extends Base
{
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

        static::deleting(function (self $comment) {
            $comment->posts()->detach();
        });
    }

    /**
     * @inheritdoc
     */
    public function newEloquentBuilder($query): CommentBuilder
    {
        return new CommentBuilder($query);
    }

    /**
     * @inheritdoc
     */
    public function newQuery(): CommentBuilder
    {
        return parent::newQuery();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class, Tables::TABLE_POSTS_TAGS);
    }

    /**
     * Setter for the 'value' attribute.
     *
     * @param string $value
     * @return $this
     */
    public function setValueAttribute(string $value)
    {
        $this->attributes['value'] = trim(str_replace(' ', '_', strtolower($value)));

        return $this;
    }

    /**
     * @return CommentEntity
     */
    public function toEntity(): CommentEntity
    {
        return new CommentEntity([
            'id' => $this->id,
            'value' => $this->value,
        ]);
    }
}
