<?php

namespace Informate\Models\Entytys\About;

use Pedreiro\Models\Base;
use Illuminate\Support\Str;

class Caracteristica extends Base
{
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
        'code',
        'name',
        'description',
        'status',
        'consequencia',
        'motivo',
        'obs',
    ];

    public $formFields = [
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
        [
            'name' => 'persons',
            'label' => 'Persons',
            'type' => 'select_multiple',
            'relationship' => 'persons'
        ],
        [
            'name' => 'consequencia',
            'label' => 'consequencia',
            'type' => 'text'
        ],
        [
            'name' => 'motivo',
            'label' => 'motivo',
            'type' => 'text'
        ],
        [
            'name' => 'obs',
            'label' => 'Obs',
            'type' => 'textarea'
        ],
        // ['name' => 'publish_on', 'label' => 'Publish Date', 'type' => 'date'],
        // ['name' => 'category_id', 'label' => 'Category', 'type' => 'select', 'relationship' => 'category'],
    ];

    public $indexFields = [
        'name',
        'description',
        'status',
        'consequencia',
        'motivo',
        'obs',
    ];

    public $validationRules = [
        'name'       => 'required|max:255',
        'description'        => 'required|max:100',
        'status'        => 'boolean',
        // 'publish_on'  => 'date',
        // 'published'   => 'boolean',
        // 'category_id' => 'required|int',
    ];

    public $validationMessages = [
        'name.required' => "Nome é obrigatório."
    ];

    public $validationAttributes = [
        'name' => 'Name'
    ];

    protected $mappingProperties = array(

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
     * Register events
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::creating(
            function ($model) {
                $model->code =  Str::kebab($model->code);
                
            }
        );
    }
    
    /**
     * Get all of the slaves that are assigned this tag.
     */
    public function persons()
    {
        return $this->morphedByMany(\Illuminate\Support\Facades\Config::get('sitec.core.models.person', \Telefonica\Models\Actors\Person::class), 'skillable');
    }

    /**
     * Get all of the users that are assigned this tag.
     */
    public function users()
    {
        return $this->morphedByMany(\Illuminate\Support\Facades\Config::get('sitec.core.models.user', \App\Models\User::class), 'skillable');
    }
}
