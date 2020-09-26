<?php

namespace Informate\Data\Ciencia\Medidas\Massa;

use Informate\Data\DataObject;

class Grama extends DataObject
{
    public static string $code = 'grama';
    public static string $name = 'Grama';

    /**
     * @var \Informate\Models\Ciencia\Padroes\Medida::class
     */
    public static string $model = \Informate\Models\Ciencia\Padroes\Medida::class;

    public static string $wiki = 'Grama';

}