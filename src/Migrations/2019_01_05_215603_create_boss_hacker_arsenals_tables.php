<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBossHackerArsenalsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weapons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
		Schema::create('weaponbles', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->string('weaponble_id');
			$table->string('weaponble_type', 255);

            $table->unsignedInteger('weapon_id')->nullable();
            // $table->foreign('weapon_id')->references('id')->on('weapons');
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
        Schema::dropIfExists('weaponbles');
        Schema::dropIfExists('weapons');
    }
}
