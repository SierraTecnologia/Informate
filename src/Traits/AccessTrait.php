<?php
/**
 * CLasse criada para controlar os acessos dentro de determinado modelo
 */

namespace Informate\Traits;

use Illuminate\Support\Facades\Log;
use Informate\Models\Model;
use Auth;
use Illuminate\Database\Eloquent\Builder;

trait AccessTrait
{
    use EloquentGetTableNameTrait;

    public static function bootAccessTrait()                                                                                                                                                             
    {
        //@todo
    }
}
