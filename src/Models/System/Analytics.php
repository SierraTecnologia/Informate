<?php

namespace Informate\Models\System;

use Informate\Traits\ArchiveTrait;

use Informate\Traits\BusinessTrait;

class Analytics extends ArchiveTrait
{
    use BusinessTrait;
    
    public $table = 'analytics';

    public $primaryKey = 'id';

    public $fillable = [
        'token',
        'data',
    ];

    public static $rules = [];
}
