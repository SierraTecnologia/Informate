<?php
/**
 *  //@todo Fazer isso aqui.. Ta dificil
 */

namespace Informate\Models\System;

use Support\Models\Base;

class Access extends Base
{

    /**
     * o proprio modelo terá o tipo de acesso:
     * access_type = 
     */

    
    public $table = 'accesses';

    public $primaryKey = 'id';

    public $fillable = [
        'name',
        'description',
        'access_type',
    ];

    public static $rules = [];
}
