<?php

namespace Informate\Models\Entytys\Category;

use Pedreiro\Models\Base;

class VehicleType extends Base
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'cpf',
        'email',
        'role_id'
    ];

    /**
     * @var string[][]
     *
     * @psalm-var array{name: array{type: string, analyzer: string}, cpf: array{type: string, analyzer: string}, email: array{type: string, analyzer: string}, role_id: array{type: string, analyzer: string}}
     */
    protected array $mappingProperties = array(
        /**
         * User Info
         */
        'name' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'cpf' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'email' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],

        /**
         * Grupo de Usuário:
         * 
         * 3 -> Usuário de Produtora
         * Default: 3
         */
        'role_id' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
    );
}