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
        return $this->morphedByMany(\Illuminate\Support\Facades\Config::get('sitec-tools.models.business', \Population\Models\Identity\Actors\Business::class), 'itemable');
    }

    /**
     * Get all of the girls that are assigned this item.
     */
    public function girls()
    {
        return $this->morphedByMany('Population\Models\Market\Actors\Girl', 'itemable');
    }

    /**
     * Get all of the users that are assigned this item.
     */
    public function users()
    {
        return $this->morphedByMany(\Illuminate\Support\Facades\Config::get('sitec.core.models.user', \App\Models\User::class), 'itemable');
    }
}
