<?php

namespace Informate\Http\Controllers\Master;

use Informate\Models\Entytys\Relations\Relation;
use Pedreiro\CrudController;

class RelationController extends Controller
{
    use CrudController;

    public function __construct(Relation $model)
    {
        $this->model = $model;
        parent::__construct();
    }
}
