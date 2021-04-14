<?php

Route::resource('/equipaments', 'EquipamentController')->parameters([
    'equipaments' => 'id'
]);