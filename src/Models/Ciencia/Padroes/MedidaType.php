<?php

namespace Informate\Models\Ciencia\Padroes;

use Pedreiro\Models\Base;

class MedidaType extends Base
{

    /**
     * @var false
     */
    protected bool $organizationPerspective = false;

    protected $table = 'medida_types';
    
    /**
     * @var false
     */
    public $incrementing = false;

    /**
     * @var string[]
     *
     * @psalm-var array{code: string}
     */
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