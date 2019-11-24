<?php
/**
 * Servidor de Database
 */

namespace Informate\Models\Entytys\Digital\Infra;

use Informate\Models\Model;

class Database extends Model
{

    public static $apresentationName = 'Online Databases';

    protected $organizationPerspective = true;

    protected $table = 'infra_databases';       

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'host',
        'user',
        'password',
        'port',
        'type_id',
    ];


    protected $mappingProperties = array(

        'host' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'user' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'password' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'port' => [
            'type' => 'integer',
            "analyzer" => "standard",
        ],
    );

    public function getApresentationName(){
        return $this->host;
    }


    public function collections()
    {
        return $this->hasMany('Informate\Models\Entytys\Digital\Infra\DatabaseCollection');
    }
}