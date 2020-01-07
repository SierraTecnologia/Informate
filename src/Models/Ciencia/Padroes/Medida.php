<?php

namespace Informate\Models\Ciencia\Padroes;

use Support\Models\Base;

class Medida extends Base
{

    protected $organizationPerspective = false;

    protected $table = 'medidas';
    
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
        'name',
        'code',
        'medida_type_id',
    ];


    protected $mappingProperties = array(

        'medida_type_code' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'name' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'code' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
    );

    public function medidaType()
    {
        return $this->belongsTo('Informate\Models\Ciencia\Padroes\Medida', 'medida_type_code', 'code');
    }

    /**
     * Get all of the persons that are assigned this tag.
     */
    public function persons()
    {
        return $this->morphedByMany(config('sitec.core.models.person', \Population\Models\Identity\Actors\Person::class), 'medidable');
    }
}