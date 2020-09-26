<?php

namespace Informate\Models\Ciencia\Padroes;

use Pedreiro\Models\Base;

class Medida extends Base
{

    /**
     * @var false
     */
    protected bool $organizationPerspective = false;

    protected string $table = 'medidas';
    
    /**
     * @var false
     */
    public bool $incrementing = false;

    /**
     * @var string[]
     *
     * @psalm-var array{code: string}
     */
    protected array $casts = [
        'code' => 'string',
    ];
    protected string $primaryKey = 'code';
    protected string $keyType = 'string';  

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


    /**
     * @var string[][]
     *
     * @psalm-var array{medida_type_code: array{type: string, analyzer: string}, name: array{type: string, analyzer: string}, code: array{type: string, analyzer: string}}
     */
    protected array $mappingProperties = array(

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

    public function medidaType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('Informate\Models\Ciencia\Padroes\Medida', 'medida_type_code', 'code');
    }

    /**
     * Get all of the persons that are assigned this tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function persons(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphedByMany(\Illuminate\Support\Facades\Config::get('sitec.core.models.person', \Telefonica\Models\Actors\Person::class), 'medidable');
    }
}