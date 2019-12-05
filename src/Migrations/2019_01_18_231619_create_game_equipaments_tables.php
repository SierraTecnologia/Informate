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
		Schema::create('equipaments', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->string('name', 255)->nullable();
			$table->text('description')->nullable();
			$table->timestamps();
            $table->softDeletes();
		});
		Schema::create('equipamentables', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->integer('equipamentable_id');
			$table->string('equipamentable_type', 255);

            $table->unsignedInteger('equipament_id')->nullable();
            // $table->foreign('equipament_id')->references('id')->on('equipaments');
			$table->timestamps();
            $table->softDeletes();
		});


		Schema::create('acessorios', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->string('name', 255)->nullable();
			$table->text('description')->nullable();
			$table->timestamps();
            $table->softDeletes();
		});
		Schema::create('acessorioables', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->integer('acessorioable_id');
			$table->string('acessorioable_type', 255);

            $table->unsignedInteger('acessorio_id')->nullable();
            // $table->foreign('acessorio_id')->references('id')->on('acessorios');
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
		Schema::drop('acessorios');
		Schema::drop('equipaments');
		Schema::drop('vehicle_types');
	}

}
