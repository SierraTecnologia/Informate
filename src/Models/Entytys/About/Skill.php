<?php

namespace Informate\Models\Entytys\About;

use Pedreiro\Models\Base;
use Illuminate\Support\Str;

class Skill extends Base
{
    protected $organizationPerspective = false;

    protected $table = 'skills';
    
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
        'description',
        'code',
        'status',
        'skill_code'
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
        // [
        //     'name' => 'status',
        //     'label' => 'Enter your content here',
        //     'type' => 'textarea'
        // ],
        // ['name' => 'publish_on', 'label' => 'Publish Date', 'type' => 'date'],
        ['name' => 'skill_code', 'label' => 'Parent', 'type' => 'select', 'relationship' => 'parent'],
        // ['name' => 'tags', 'label' => 'Tags', 'type' => 'select_multiple', 'relationship' => 'tags'],
    ];

    public $indexFields = [
        'code',
        'name',
        'description',
        'status',
        'skill_code',
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
     * Parent Skill
     */
    public function parent()
    {
        return $this->belongsTo(Skill::class, 'skill_code', 'code');
    }
    // @todo parente skill_code
    // /**
    //  * Get all of the persons that are assigned this tag.
    //  */
    // public function persons()
    // {
    //     return $this->morphedByMany(\Illuminate\Support\Facades\Config::get('sitec.core.models.person', \Telefonica\Models\Actors\Person::class), 'skillable');
    // }

    // /**
    //  * Get all of the videos that are assigned this tag.
    //  */
    // public function videos()
    // {
    //     return $this->morphedByMany(\Illuminate\Support\Facades\Config::get('sitec.core.models.video', \MediaManager\Models\Video::class), 'skillable')
    //         ->withPivot('valor');
    // }
}
