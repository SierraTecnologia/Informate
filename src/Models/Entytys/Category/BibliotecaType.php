<?php

namespace Informate\Models\Entytys\Category;

use Pedreiro\Models\Base;

class BibliotecaType extends Base
{
    /**
     * @var string[]
     *
     * @psalm-var array{name: string}
     */
    public array $rules = [
    'name'   => 'required',
    // 'slug'    => 'required|unique:posts,slug',
    // 'content' => 'required'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * @var string[][]
     *
     * @psalm-var array{name: array{type: string, analyzer: string}}
     */
    protected array $mappingProperties = array(
        /**
         * User Info
         */
        'name' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
    );

    public function bibliotecas(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('Population\Models\Market\Informacao\Biblioteca', 'biblioteca_type_id', 'id');
    }
}
