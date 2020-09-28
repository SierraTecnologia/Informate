<?php

namespace Informate\Models\Entytys\Relations;

use Pedreiro\Models\Base;

class RelationType extends Base
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'relation_type_id'
    ];

    /**
     * @var string[][]
     *
     * @psalm-var array{name: array{type: string, analyzer: string}, relation_type_id: array{type: string, analyzer: string}}
     */
    protected array $mappingProperties = array(
        /**
         * User Info
         */
        'name' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'relation_type_id' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
    );
    
    /**
     * Get all of the relations that are assigned this tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function relations(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany('Population\Models\Market\Relations\Relation');
    }
    
    /**
     * Get all of the slaves that are assigned this tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function persons(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphedByMany(\Illuminate\Support\Facades\Config::get('application.directorys.models.persons', \Telefonica\Models\Actors\Person::class), 'personable');
    }
}
