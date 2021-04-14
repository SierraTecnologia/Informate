<?php

Route::resource('/acessorios', 'AcessorioController')->parameters([
    'acessorios' => 'id'
]);
