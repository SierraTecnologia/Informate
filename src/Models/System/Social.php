<?php
namespace Informate\Models\System;

use Support\Models\Base;

class Social extends Base {

    protected $table = 'social_logins';

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}