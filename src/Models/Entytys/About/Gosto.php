<?php

namespace Informate\Models\Entytys\About;

use Support\Models\Base;

class Gosto extends Base
{
    
    public $incrementing = false;
    protected $casts = [
        'code' => 'string',
    ];
    protected $primaryKey = 'code';
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'text',
        'description',
        'gosto_code'
    ];

    protected $mappingProperties = array(
        /**
         * User Info
         */
        'code' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
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
        'gosto_code' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
    );

    /**
     * Get all of the businesses that are assigned this gosto.
     */
    public function businesses()
    {
        return $this->morphedByMany(config('sitec-tools.models.business', \Population\Models\Identity\Actors\Business::class), 'gostoable');
    }

    /**
     * Get all of the persons that are assigned this gosto.
     */
    public function persons()
    {
        return $this->morphedByMany('Population\Models\Identity\Actors\Person', 'gostoable');
    }

    /**
     * Get all of the users that are assigned this gosto.
     */
    public function users()
    {
        return $this->morphedByMany('App\Models\User', 'gostoable');
    }
}
