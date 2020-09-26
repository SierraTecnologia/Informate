<?php

namespace Informate\Data\Ciencia\Medidas\Volume;

use Informate\Data\DataObject;

class Litro extends DataObject
{
    public static string $code = 'litro';
    public static string $name = 'Litro';

    /**
     * @var \Informate\Models\Ciencia\Padroes\Medida::class
     */
    public static string $model = \Informate\Models\Ciencia\Padroes\Medida::class;

    public static string $wiki = 'Litro';

}