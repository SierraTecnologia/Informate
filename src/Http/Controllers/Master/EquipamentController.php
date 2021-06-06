<?php

namespace Informate\Http\Controllers\Master;

use Informate\Models\Entytys\Fisicos\Equipament;
use Pedreiro\CrudController;

class EquipamentController extends Controller
{
    use CrudController;

    public function __construct(Equipament $model)
    {
        $this->model = $model;
        parent::__construct();
    }
}
