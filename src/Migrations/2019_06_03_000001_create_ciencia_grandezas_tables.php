<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCienciaGrandezasTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        

      /**
      * Medida Type
      */
      Schema::create('medida_types', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->string('code')->unique();
        $table->primary('code');

        $table->string('name', 255)->nullable();

        $table->timestamps();
        $table->softDeletes();
      });

      Schema::create('medidas', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->string('code')->unique();
        $table->primary('code');

        $table->string('name', 255)->nullable();
        $table->string('description', 255)->nullable();
        $table->integer('status')->default(1);

        $table->string('medida_type_code');
        $table->foreign('medida_type_code')->references('code')->on('medida_types');

        $table->timestamps();
        $table->softDeletes();
      });
      
      Schema::create('medidables', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->string('value', 255)->nullable();
        $table->string('medidable_id')->nullable();
        $table->string('medidable_type', 255)->nullable();

        $table->string('medida_code');
        $table->foreign('medida_code')->references('code')->on('medidas');

        $table->timestamps();
        $table->softDeletes();
      });
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('medidables');
      Schema::dropIfExists('medidas');
      Schema::dropIfExists('medida_types');
    }
}
