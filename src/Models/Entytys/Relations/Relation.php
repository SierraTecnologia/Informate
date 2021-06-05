<?php

namespace Informate\Models\Entytys\Relations;

// use Locaravel\Models\Model;
use Pedreiro\Models\Base as Model;

class Relation extends Model
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
        'name',
        'code',
        'status',
        'relation_type_code',
        'bottom_code',
        'top_code',
        'name_relation_to',
        'name_relation_from'
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
        // [
        //     'name' => 'agencia',
        //     'label' => 'agencia',
        //     'type' => 'text'
        // ],
        [
            'name' => 'description',
            'label' => 'description',
            'type' => 'text'
        ],
        [
            'name' => 'name_relation_to',
            'label' => 'name_relation_to',
            'type' => 'text'
        ],
        [
            'name' => 'name_relation_from',
            'label' => 'name_relation_from',
            'type' => 'text'
        ],
        // [
        //     'name' => 'slug',
        //     'label' => 'slug',
        //     'type' => 'text'
        // ],
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

    public $indexFields = [
        'code',
        'name',
        'description',
        'name_relation_to',
        'name_relation_from',
        // 'slug',
        'status'
    ];

    // /**
    //  * Get the type that owns the phone.
    //  */
    // public function type()
    // {
    //     return $this->belongsTo(RelationType::class);
    // }

    // /**
    //  * Get the rooms
    //  *
    //  * @return array
    //  */
    // public function rooms()
    // {
    //     return $this->aparts();
    // }
    // /**
    //  * Get the aparts
    //  *
    //  * @return array
    //  */
    // public function aparts()
    // {
    //     return $this->hasMany(Apart::class); //, 'hotel_id');
    // }
}
