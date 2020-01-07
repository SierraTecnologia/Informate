<?php

namespace Informate\Models\System;

use Support\Models\Base;
use App\Models\User;

class Activation extends Base
{

    public function user()
    {
        return $this->belongsTo(config('sitec.core.models.user', \App\Models\User::class));
    }

}