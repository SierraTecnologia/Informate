<?php


if (\Muleta\Modules\Features\Resources\FeatureHelper::hasActiveFeature(
    [
        'academy',
    ]
)){
    Route::resource('/skills', 'SkillController')->parameters([
        'skills' => 'id'
    ]);
}



if (\Muleta\Modules\Features\Resources\FeatureHelper::hasActiveFeature(
    [
        'social-relations',
    ]
)){
    Route::resource('/positions', 'PositionController')->parameters([
        'positions' => 'id'
    ]);

    Route::resource('/relations', 'RelationController')->parameters([
        'relations' => 'id'
    ]);
}