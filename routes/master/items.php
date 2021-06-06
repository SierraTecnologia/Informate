<?php


if (\Muleta\Modules\Features\Resources\FeatureHelper::hasActiveFeature(
    [
        'espolio',
    ]
)){
    Route::resource('/items', 'ItemController')->parameters([
        'items' => 'id'
    ]);
    Route::resource('/equipaments', 'EquipamentController')->parameters([
        'equipaments' => 'id'
    ]);
    Route::resource('/acessorios', 'AcessorioController')->parameters([
        'acessorios' => 'id'
    ]);
}