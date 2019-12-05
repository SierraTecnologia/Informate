<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFisicoVeiculosTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        

      /**
      * Veiculo Type
      */
      Schema::create('vehicle_types', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->increments('id')->unsigned();
        $table->string('name', 255)->nullable();
        $table->timestamps();
              $table->softDeletes();
      });
      
      
      // Schema::create('integrations', function (Blueprint $table) {
      //   $table->engine = 'InnoDB';
      //   $table->increments('id')->unsigned();
      //   $table->string('name', 255)->nullable();
      //   $table->string('description', 255)->nullable();
      //   $table->integer('code')->nullable();
      //   $table->integer('status')->nullable();
      //   $table->integer('integration_id')->nullable();
      //   $table->timestamps();
      //         $table->softDeletes();
      // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
