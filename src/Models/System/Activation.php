<?php

namespace Informate\Models\System;

use Support\Models\Base;

class Activation extends Base
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}