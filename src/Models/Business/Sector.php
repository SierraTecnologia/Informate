<?php

namespace Informate\Models\Business;

use Support\Models\Base;

class Sector extends Base
{

    protected $organizationPerspective = false;

    protected $table = 'business_sectors';       

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'business_sector_id',
        'status',
    ];


    protected $mappingProperties = array(

        'user_id' => [
            'type' => 'integer',
            "analyzer" => "standard",
        ],
        'name' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'slug' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
    );

    public function user()
    {
        return $this->belongsTo(config('sitec.core.models.user', \App\Models\User::class), 'user_id', 'id');
    }

}