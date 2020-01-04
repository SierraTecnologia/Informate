<?php

namespace Informate\Data\Ciencia\Medidas\Volume;

use Informate\Data\DataObject;

class Litro extends DataObject
{
    public static $code = 'litro';
    public static $name = 'Litro';
    public static $model = \Informate\Models\Ciencia\Padroes\Medida::class;

    public static $wiki = 'Litro';

}