<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameTotalControlTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		/**
		 * Tarefas
		 */
		Schema::create('tasks', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->string('name', 255)->nullable();
			$table->integer('taskable_id')->nullable();
			$table->string('taskable_type', 255)->nullable();
			$table->timestamps();
            $table->softDeletes();
		});


		/**
		 * Veiculo Type
		 */
		Schema::create('vehicle_type', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->string('name', 255)->nullable();
			$table->timestamps();
            $table->softDeletes();
		});


		Schema::create('displacements', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->string('username', 255)->nullable();
			$table->string('email')->nullable();
			$table->integer('status')->nullable();
			$table->integer('integration_id')->nullable();
			$table->timestamps();
            $table->softDeletes();
		});
        
		Schema::create('displacementables', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->boolean('is_sincronizado')->default(false);
			$table->integer('displacementable_id');
			$table->string('displacementable_type', 255);

            $table->integer('displacement_id')->nullable();
            // $table->foreign('displacement_id')->references('id')->on('displacements');
			$table->timestamps();
            $table->softDeletes();
		});



		/**
		 * Mensal
		 */
		Schema::create('routines', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->string('name', 255)->nullable();
			$table->unsignedInteger('routinable_id')->nullable();
			$table->string('routinable_type', 255)->nullable();
			$table->timestamps();
            $table->softDeletes();
		});
		Schema::create('workers', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->string('name', 255)->nullable();
			$table->string('init', 255)->nullable();
			$table->string('time', 255)->nullable();
			$table->unsignedInteger('workerable_id')->nullable();
			$table->string('workerable_type', 255)->nullable();
			$table->timestamps();
            $table->softDeletes();
		});

		/**
		 * Financeiro
		 */
		Schema::create('banks', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->string('name', 255);
			$table->string('descriptions', 255)->nullable();
			$table->timestamps();
            $table->softDeletes();
		});
        
		Schema::create('bankables', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->string('agencia', 255)->nullable();
			$table->string('conta', 255)->nullable();
			$table->unsignedInteger('bankable_id');
			$table->string('bankable_type', 255);

            $table->unsignedInteger('bank_id')->nullable();
            // $table->foreign('bank_id')->references('id')->on('banks');
			$table->timestamps();
            $table->softDeletes();
		});


		Schema::create('transfers', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->string('money_code')->default('BRL');
			$table->decimal('amount', 8, 2);
			$table->unsignedInteger('transferable_id');
			$table->string('transferable_type', 255);
			$table->timestamps();
            $table->softDeletes();
		});
		Schema::create('rendas', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->string('descriptions', 255)->nullable();
			$table->decimal('value');
			$table->unsignedInteger('rendable_id')->nullable();
			$table->string('rendable_type', 255)->nullable();
			$table->timestamps();
            $table->softDeletes();
		});
		Schema::create('gastos', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->string('descriptions', 255)->nullable();
			$table->decimal('value');
			$table->unsignedInteger('gastoable_id')->nullable();
			$table->string('gastoable_type', 255)->nullable();
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
		Schema::drop('photos');
	}

}
