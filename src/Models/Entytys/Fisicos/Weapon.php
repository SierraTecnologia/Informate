<?php

namespace Informate\Models\Entytys\Fisicos;

use Pedreiro\Models\Base;
use Telefonica\Traits\AsFofocavel;

class Weapon extends Base
{
    use AsFofocavel;

    protected $organizationPerspective = false;

    protected $table = 'weapons';       

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'url',
        'description',
        'obs',
    ];


    protected $mappingProperties = array(

        'name' => [
            'type' => 'integer',
            "analyzer" => "standard",
        ],
    );

    
    /**
     * Get all of the slaves that are assigned this tag.
     */
    public function persons()
    {
        return $this->morphedByMany(\Illuminate\Support\Facades\Config::get('application.directorys.models.persons', \Telefonica\Models\Actors\Person::class), 'equipamentable');
    }

    /**
     * Get all of the users that are assigned this tag.
     */
    public function users()
    {
        return $this->morphedByMany(\Illuminate\Support\Facades\Config::get('application.directorys.models.users', \App\Models\User::class), 'equipamentable');
    }

    /**
     * Get all of the post's observations.
     */
    public function observations()
    {
        return $this->comments();
    }

    /**
     * Get all of the post's comments.
     */
    public function comments()
    {
        return $this->morphMany('Transmissor\Models\Comment', 'commentable');
    }
    
    /**
     * One To Many (Polymorphic) - Feature FA
     *
     * @return void
     */
    public function infos()
    {
        return $this->morphMany('Population\Models\Market\Abouts\Info', 'infoable');
    }


}