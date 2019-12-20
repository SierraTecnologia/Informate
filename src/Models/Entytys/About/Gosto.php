<?php

namespace Informate\Models\Entytys\About;

use Support\Models\Base;

class Gosto extends Base
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'text',
        'description',
        'gosto_id'
    ];

    protected $mappingProperties = array(
        /**
         * User Info
         */
        'name' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'text' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'description' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'gosto_id' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
    );

    /**
     * Get all of the businesses that are assigned this gosto.
     */
    public function businesses()
    {
        return $this->morphedByMany(config('sitec-tools.models.business'), 'gostoable');
    }

    /**
     * Get all of the girls that are assigned this gosto.
     */
    public function girls()
    {
        return $this->morphedByMany('Population\Models\Identity\Girl', 'gostoable');
    }

    /**
     * Get all of the users that are assigned this gosto.
     */
    public function users()
    {
        return $this->morphedByMany('App\Models\User', 'gostoable');
    }
}
