<?php

Route::resource('/skills', 'SkillController')->parameters([
    'skills' => 'id'
]);

Route::resource('/positions', 'PositionController')->parameters([
    'positions' => 'id'
]);