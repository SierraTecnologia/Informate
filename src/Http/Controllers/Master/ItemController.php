<?php

namespace Informate\Http\Controllers\Master;

use Informate\Models\Entytys\Fisicos\Item;
use Pedreiro\CrudController;

class ItemController extends Controller
{
    use CrudController;

    public function __construct(Item $model)
    {
        $this->model = $model;
        parent::__construct();
    }
}
