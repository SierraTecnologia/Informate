<?php
/**
 * @todo Fazer ainda aqui
 */

namespace Informate\Data;

class DataObject
{
    public static function getId()
    {
        return static::$code;
    }
    
    public static function getEloquent()
    {
        $model = static::$model;
        return $model::createIfNotExistAndReturn(static::$getData());
    }

    /**
     * @return array
     *
     * @psalm-return array{code: mixed, name: mixed}
     */
    public static function getData(): array
    {
        return [
            'code' => static::$code,
            'name' => static::$name,
        ];
    }
}