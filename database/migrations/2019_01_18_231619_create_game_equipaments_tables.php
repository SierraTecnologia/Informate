<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameEquipamentsTables extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!\Muleta\Modules\Features\Resources\FeatureHelper::hasActiveFeature(
            [
                'espolio',
            ]
        )){
            return ;
        }
        
        
        Schema::create(
            'items', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('id')->unsigned();
                $table->string('name', 255);
                $table->string('description', 255);
                $table->timestamps();
                $table->softDeletes();
            }
        );
        Schema::create(
            'itemables', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->integer('item_id')->unsigned();
                $table->string('itemable_id');
                $table->string('itemable_type', 255);
                $table->timestamps();
                $table->softDeletes();
            }
        );
        
        Schema::create(
            'equipaments', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('id')->unsigned();
                $table->string('name', 255)->nullable();
                $table->text('description')->nullable();
                $table->timestamps();
                $table->softDeletes();
            }
        );
        Schema::create(
            'equipamentables', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('id')->unsigned();
                $table->string('equipamentable_id');
                $table->string('equipamentable_type', 255);

                $table->unsignedInteger('equipament_id')->nullable();
                // $table->foreign('equipament_id')->references('id')->on('equipaments');
                $table->timestamps();
                $table->softDeletes();
            }
        );


        Schema::create(
            'acessorios', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('id')->unsigned();
                $table->string('name', 255)->nullable();
                $table->text('description')->nullable();
                $table->timestamps();
                $table->softDeletes();
            }
        );
        Schema::create(
            'acessorioables', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('id')->unsigned();
                $table->string('acessorioable_id');
                $table->string('acessorioable_type', 255);

                $table->unsignedInteger('acessorio_id')->nullable();
                // $table->foreign('acessorio_id')->references('id')->on('acessorios');
                $table->timestamps();
                $table->softDeletes();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acessorios');
        Schema::dropIfExists('equipaments');
        Schema::dropIfExists('vehicle_types');
    }

}
