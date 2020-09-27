<?php

namespace Informate\Models\Business;

use Pedreiro\Models\Base;

class Sector extends Base
{
    /**
     * @var false
     */
    protected bool $organizationPerspective = false;

    protected $table = 'business_sectors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'slug',
        'status',
        'business_sector_id',
    ];


    /**
     * @var string[][]
     *
     * @psalm-var array{user_id: array{type: string, analyzer: string}, name: array{type: string, analyzer: string}, slug: array{type: string, analyzer: string}}
     */
    protected array $mappingProperties = array(

        'user_id' => [
            'type' => 'integer',
            "analyzer" => "standard",
        ],
        'name' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'slug' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
    );

    
    /**
     * @var string[][]
     *
     * @psalm-var array{0: array{name: string, label: string, type: string}, 1: array{name: string, label: string, type: string}, 2: array{name: string, label: string, type: string}, 3: array{name: string, label: string, type: string}}
     */
    public array $formFields = [
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
            'name' => 'slug',
            'label' => 'slug',
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
     * @psalm-var array{0: string, 1: string, 2: string, 3: string}
     */
    public array $indexFields = [
        'name',
        'description',
        'slug',
        'status'
    ];

    /**
     * @var string[]
     *
     * @psalm-var array{name: string, description: string, slug: string, status: string}
     */
    public array $validationRules = [
        'name'       => 'required|max:255',
        'description'        => 'required|max:100',
        'slug'        => 'required|max:100',
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
    
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Illuminate\Support\Facades\Config::get('sitec.core.models.user', \App\Models\User::class), 'user_id', 'id');
    }
}
