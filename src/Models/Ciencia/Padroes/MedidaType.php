<?php

namespace Informate\Models\Ciencia\Padroes;

use Pedreiro\Models\Base;

class MedidaType extends Base
{

    /**
     * @var false
     */
    protected bool $organizationPerspective = false;

    protected string $table = 'medida_types';
    
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
    ];


    /**
     * @var string[][]
     *
     * @psalm-var array{name: array{type: string, analyzer: string}, code: array{type: string, analyzer: string}}
     */
    protected array $mappingProperties = array(
        'name' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'code' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
    );

}