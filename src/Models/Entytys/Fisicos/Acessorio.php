<?php

namespace Informate\Models\Entytys\Fisicos;

use Pedreiro\Models\Base;

class Acessorio extends Base
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    protected $mappingProperties = array(
        /**
         * User Info
         */
        'name' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
    );
    
    public $formFields = [
        ['name' => 'name', 'label' => 'name', 'type' => 'text'],
        ['name' => 'url', 'label' => 'url', 'type' => 'text'],
        ['name' => 'status', 'label' => 'Enter your content here', 'type' => 'textarea'],
        // ['name' => 'publish_on', 'label' => 'Publish Date', 'type' => 'date'],
        // ['name' => 'published', 'label' => 'Published', 'type' => 'checkbox'],
        // ['name' => 'category_id', 'label' => 'Category', 'type' => 'select', 'relationship' => 'category'],
        // ['name' => 'tags', 'label' => 'Tags', 'type' => 'select_multiple', 'relationship' => 'tags'],
    ];

    public $indexFields = [
        'name',
        'url',
        'status'
    ];

    public $validationRules = [
        'name'       => 'required|max:255',
        'url'        => 'required|max:100',
        'status'        => 'required',
        // 'publish_on'  => 'date',
        // 'published'   => 'boolean',
        // 'category_id' => 'required|int',
    ];

    public $validationMessages = [
        'name.required' => "Nome é obrigatório."
    ];

    public $validationAttributes = [
        'name' => 'Project Name'
    ];
    public function getApresentationName()
    {
        return $this->slug.' - '.$this->name;
    }

    /**
     * Get all of the slaves that are assigned this tag.
     */
    public function persons()
    {
        return $this->morphedByMany(\Illuminate\Support\Facades\Config::get('sitec.core.models.person', \Telefonica\Models\Actors\Person::class), 'acessorioable');
    }

    /**
     * Get all of the users that are assigned this tag.
     */
    public function users()
    {
        return $this->morphedByMany(\Illuminate\Support\Facades\Config::get('sitec.core.models.user', \App\Models\User::class), 'acessorioable');
    }
}
