<?php

namespace Informate\Models\Entytys\About;

use Pedreiro\Models\Base;

class Skill extends Base
{
    /**
     * @var false
     */
    protected bool $organizationPerspective = false;

    protected $table = 'skills';
    
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
        'description',
        'code',
        'status',
        'skill_code'
    ];

    
    /**
     * @var string[][]
     *
     * @psalm-var array{0: array{name: string, label: string, type: string}, 1: array{name: string, label: string, type: string}, 2: array{name: string, label: string, type: string}, 3: array{name: string, label: string, type: string}}
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
            'name' => 'description',
            'label' => 'description',
            'type' => 'text'
        ],
        [
            'name' => 'status',
            'label' => 'Status',
            'type' => 'checkbox'
        ],
        // [
        //     'name' => 'status',
        //     'label' => 'Enter your content here',
        //     'type' => 'textarea'
        // ],
        // ['name' => 'publish_on', 'label' => 'Publish Date', 'type' => 'date'],
        // ['name' => 'category_id', 'label' => 'Category', 'type' => 'select', 'relationship' => 'category'],
        // ['name' => 'tags', 'label' => 'Tags', 'type' => 'select_multiple', 'relationship' => 'tags'],
    ];

    /**
     * @var string[]
     *
     * @psalm-var array{0: string, 1: string, 2: string}
     */
    public array $indexFields = [
        'name',
        'description',
        'status'
    ];

    /**
     * @var string[]
     *
     * @psalm-var array{name: string, description: string, status: string}
     */
    public array $validationRules = [
        'name'       => 'required|max:255',
        'description'        => 'required|max:100',
        'status'        => 'boolean',
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
     * @psalm-var array{name: array{type: string, analyzer: string}, description: array{type: string, analyzer: string}, code: array{type: string, analyzer: string}, status: array{type: string, analyzer: string}}
     */
    protected array $mappingProperties = array(

        'name' => [
            'type' => 'integer',
            "analyzer" => "standard",
        ],
        'description' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'code' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'status' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
    );

    /**
     * Get all of the persons that are assigned this tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function persons(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphedByMany(\Illuminate\Support\Facades\Config::get('sitec.core.models.person', \Telefonica\Models\Actors\Person::class), 'skillable');
    }
}
