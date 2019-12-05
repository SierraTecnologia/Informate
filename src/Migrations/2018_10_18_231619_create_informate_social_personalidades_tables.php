<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformateSocialPersonalidadesTables extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        
		Schema::create(config('app.db-prefix', '').'tastes', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->string('url', 255);
			$table->string('tasteable_id')->nullable();
			$table->string('tasteable_type', 255)->nullable();
			$table->timestamps();
            $table->softDeletes();
		});
		Schema::create(config('app.db-prefix', '').'tasteables', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->integer('taste_id');
			$table->string('tasteable_id');
			$table->string('tasteable_type', 255);
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



		Schema::dropIfExists('tasteables');
		Schema::dropIfExists('tastes');
	}

}
