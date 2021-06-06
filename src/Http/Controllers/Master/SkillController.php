<?php

namespace Informate\Http\Controllers\Master;

use Informate\Models\Entytys\About\Skill;
use Pedreiro\CrudController;

class SkillController extends Controller
{
    use CrudController;

    public function __construct(Skill $model)
    {
        $this->model = $model;
        parent::__construct();
    }
}
