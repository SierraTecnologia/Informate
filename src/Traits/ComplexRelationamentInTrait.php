<?php
/**
 * Possui Tabelas que se ligam a essa tabela
 * atraves do
 * model_id
 * model
 */

namespace Informate\Traits;

trait ComplexRelationamentInTrait
{
    // Acrescentar na tabela
    // protected static $COMPLEX_RELATIONAMENT_IN_MODELS = [
    //     \Informate\Models\Entytys\Digital\Bot\Task::class
    // ];

    public static function getTableName()
    {
        return ((new self)->getTable());
    }

}