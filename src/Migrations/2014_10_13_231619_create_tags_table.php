<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tags', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->string('name', 255)->nullable();
            $table->string('text')->default('');
			$table->timestamps();
            $table->softDeletes();
		});
        
		Schema::create('tagables', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->integer('tagable_id')->nullable();
			$table->string('tagable_type', 255)->nullable();

            $table->integer('tag_id')->nullable();
            // $table->foreign('tag_id')->references('id')->on('tags');
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
		Schema::drop('tagables');
		Schema::drop('tags');
	}

}
