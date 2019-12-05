<?php
/**
 * Gostos e Feitiches em Gerais
 */

namespace Gamer\Models;

use App\Models\User;
use Informate\Models\Model;

class Taste extends Model
{
    public $table = "tastes";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        'user_id',
        'name',
    ];

    public static $rules = [
        'name' => 'required|unique:tastes'
    ];
}
