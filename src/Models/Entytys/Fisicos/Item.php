<?php

namespace Informate\Models\Entytys\Fisicos;

use Support\Models\Base;

class Item extends Base
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'item_id'
    ];

    protected $mappingProperties = array(
        /**
         * User Info
         */
        'name' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'description' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'item_id' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
    );

    /**
     * Get all of the businesses that are assigned this item.
     */
    public function businesses()
    {
        return $this->morphedByMany(config('sitec-tools.models.business'), 'itemable');
    }

    /**
     * Get all of the girls that are assigned this item.
     */
    public function girls()
    {
        return $this->morphedByMany('Population\Models\Identity\Girl', 'itemable');
    }

    /**
     * Get all of the users that are assigned this item.
     */
    public function users()
    {
        return $this->morphedByMany('App\Models\User', 'itemable');
    }
}
