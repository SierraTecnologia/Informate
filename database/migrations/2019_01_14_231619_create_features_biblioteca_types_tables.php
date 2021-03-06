<?php

use Informate\Models\Entytys\Category\BibliotecaType;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesBibliotecaTypesTables extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'biblioteca_types', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('id')->unsigned();
                $table->string('name', 255);
                $table->text('description')->nullable();
                $table->timestamps();
                $table->softDeletes();
            }
        );

        BibliotecaType::create(
            [
            'id' => 1,
            'name' => 'Portal',
            ]
        );

        BibliotecaType::create(
            [
            'id' => 2,
            'name' => 'Aplicativo',
            ]
        );

        BibliotecaType::create(
            [
            'id' => 3,
            'name' => 'Livro',
            ]
        );

        BibliotecaType::create(
            [
            'id' => 4,
            'name' => 'Filmes',
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::dropIfExists('biblioteca_types');
    }

}
