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

    /**
     * @var true
     */
    public $timestamps = true;

    /**
     * @var string[]
     *
     * @psalm-var array{0: string, 1: string}
     */
    public $fillable = [
        'user_id',
        'name',
    ];

    /**
     * @var string[]
     *
     * @psalm-var array{name: string}
     */
    public $rules = [
        'name' => 'required|unique:tastes'
    ];

    /**
     * Get the owning tasteable model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function tasteable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }
}
