<?php

namespace Informate\Models\Entytys\Fisicos;

use Pedreiro\Models\Base;

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

    /**
     * @var string[][]
     *
     * @psalm-var array{name: array{type: string, analyzer: string}, description: array{type: string, analyzer: string}, item_id: array{type: string, analyzer: string}}
     */
    protected array $mappingProperties = array(
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
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function businesses(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphedByMany(\Illuminate\Support\Facades\Config::get('sitec-tools.models.business', \Telefonica\Models\Actors\Business::class), 'itemable');
    }

    /**
     * Get all of the girls that are assigned this item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function girls(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphedByMany('Population\Models\Market\Actors\Girl', 'itemable');
    }

    /**
     * Get all of the users that are assigned this item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function users(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphedByMany(\Illuminate\Support\Facades\Config::get('sitec.core.models.user', \App\Models\User::class), 'itemable');
    }
}
