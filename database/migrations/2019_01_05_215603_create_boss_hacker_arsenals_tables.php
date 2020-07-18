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
        Schema::create(
            'weapons', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('url')->nullable();
                $table->string('description')->nullable();
                $table->string('obs')->nullable();
                $table->timestamps();
            }
        );
        Schema::create(
            'weaponables', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('id')->unsigned();
                $table->string('weaponable_id');
                $table->string('weaponable_type', 255);

                $table->unsignedInteger('weapon_id')->nullable();
                // $table->foreign('weapon_id')->references('id')->on('weapons');
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
        Schema::dropIfExists('weaponables');
        Schema::dropIfExists('weapons');
    }
}
