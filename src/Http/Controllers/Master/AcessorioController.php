<?php

namespace Informate\Http\Controllers\Master;

use Informate\Models\Entytys\Fisicos\Acessorio;
use Pedreiro\CrudController;

class AcessorioController extends Controller
{
    use CrudController;

    public function __construct(Acessorio $model)
    {
        $this->model = $model;
        parent::__construct();
    }
}
