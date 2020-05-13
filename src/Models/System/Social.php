<?php
namespace Informate\Models\System;

use Support\Models\Base;

class Social extends Base {

    protected $table = 'social_logins';

    public function user()
    {
        return $this->belongsTo(\Illuminate\Support\Facades\Config::get('sitec.core.models.user', \App\Models\User::class));
    }
}