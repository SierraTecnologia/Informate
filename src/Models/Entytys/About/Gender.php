<?php
/**
 * @todo Fazer
 * Procurar por todos ", 'skillable');" e consertar o problema de copy cola
 */

namespace Informate\Models\Entytys\About;

use Pedreiro\Models\Base;

class Gender extends Base
{

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
     * @psalm-var array{0: array{name: string, label: string, type: string}, 1: array{name: string, label: string, type: string}, 2: array{name: string, label: string, type: string, relationship: string}}
     */
    public array $formFields = [
        [
            'name' => 'code',
            'label' => 'code',
            'type' => 'text'
        ],
        [
            'name' => 'name',
            'label' => 'name',
            'type' => 'text'
        ],
        [
            'name' => 'persons',
            'label' => 'Persons',
            'type' => 'select_multiple',
            'relationship' => 'persons'
        ],
        // [
        //     'name' => 'status',
        //     'label' => 'Enter your content here',
        //     'type' => 'textarea'
        // ],
        // ['name' => 'publish_on', 'label' => 'Publish Date', 'type' => 'date'],
        // ['name' => 'category_id', 'label' => 'Category', 'type' => 'select', 'relationship' => 'category'],
    ];

    /**
     * @var string[]
     *
     * @psalm-var array{0: string}
     */
    public array $indexFields = [
        'name',
    ];

    /**
     * @var string[]
     *
     * @psalm-var array{name: string}
     */
    public array $validationRules = [
        'name'       => 'required|max:255',
        // 'publish_on'  => 'date',
        // 'published'   => 'boolean',
        // 'category_id' => 'required|int',
    ];

    /**
     * @var string[]
     *
     * @psalm-var array{'name.required': string}
     */
    public array $validationMessages = [
        'name.required' => "Nome é obrigatório."
    ];

    /**
     * @var string[]
     *
     * @psalm-var array{name: string}
     */
    public array $validationAttributes = [
        'name' => 'Name'
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
    
    /**
     * Get all of the slaves that are assigned this tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function persons(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphedByMany(\Illuminate\Support\Facades\Config::get('application.directorys.models.persons', \Telefonica\Models\Actors\Person::class), 'genderable');
    }

    /**
     * Get all of the users that are assigned this tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function users(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphedByMany(\Illuminate\Support\Facades\Config::get('application.directorys.models.users', \App\Models\User::class), 'genderable');
    }
}
