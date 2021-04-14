<?php

namespace Informate\Http\Controllers\Master;

use Informate\Models\Entytys\Relations\Position;
use Pedreiro\CrudController;

class PositionController extends Controller
{
    use CrudController;

    public function __construct(Position $model)
    {
        $this->model = $model;
        parent::__construct();
    }
}
