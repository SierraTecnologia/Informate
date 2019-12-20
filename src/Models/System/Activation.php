<?php

namespace Informate\Models\System;

use Informate\Modela\Model;

class Activation extends Base
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}