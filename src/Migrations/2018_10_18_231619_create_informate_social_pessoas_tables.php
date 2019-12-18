<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformateSocialPessoasTables extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        
        
		Schema::create(config('app.db-prefix', '').'gostos', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->string('name', 255)->nullable();
			$table->string('text', 255)->nullable();
			$table->string('description', 255)->nullable();
			$table->integer('status')->nullable();
			$table->integer('gosto_id')->nullable();
			$table->timestamps();
            $table->softDeletes();
		});
        
		Schema::create(config('app.db-prefix', '').'gostoables', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->integer('gosto_id')->nullable();
			$table->string('valor', 255)->nullable();
			$table->string('gostoable_id');
			$table->string('gostoable_type', 255);
			$table->timestamps();
            $table->softDeletes();
		});
        
		Schema::create(config('app.db-prefix', '').'items', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->string('name', 255);
			$table->string('description', 255);
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
		Schema::dropIfExists('items');
		Schema::dropIfExists('gostoables');
		Schema::dropIfExists('gostos');
	}

}
