<?php

Route::resource('/skills', 'SkillController')->parameters([
    'skills' => 'id'
]);