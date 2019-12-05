<?php

namespace Informate\Traits;

trait EloquentGetTableNameTrait
{

    public static function getTableName()
    {
        return ((new self)->getTable());
    }

}