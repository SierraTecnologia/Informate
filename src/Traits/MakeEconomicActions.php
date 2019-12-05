<?php

namespace Informate\Traits;

use Illuminate\Support\Facades\Log;

trait MakeEconomicActions
{

    /**
     * Financeiro
     */
    public function banks()
    {
        return $this->morphToMany('Informate\Models\Market\Actors\Bank', 'bankable');
    }
    public function rendas()
    {
        return $this->morphMany('Informate\Models\Market\Abouts\Renda', 'rendable');
    }
    public function gastos()
    {
        return $this->morphMany('Informate\Models\Market\Actions\Gasto', 'gastoable');
    }

    /**
     * Events
     */
    public static function bootMakeEconomicActions()                                                                                                                                                             
    {

        // static::deleting(function (self $user) {
        //     optional($user->photos)->each(function (Photo $photo) {
        //         $photo->delete();
        //     });
        // });
    }
    

}
