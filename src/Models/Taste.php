<?php
/**
 * Gostos e Feitiches em Gerais
 */

namespace Informate\Models;

use App\Models\User;
use Pedreiro\Models\Base;

class Taste extends Base
{
    public $table = "tastes";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        'user_id',
        'name',
    ];

    public $rules = [
        'name' => 'required|unique:tastes'
    ];

    /**
     * Get the owning tasteable model.
     */
    public function tasteable()
    {
        return $this->morphTo();
    }
}
