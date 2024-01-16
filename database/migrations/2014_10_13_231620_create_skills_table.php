<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        /**
         * Skills
         */
        Schema::create(
            'skills', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->string('code')->unique();
                $table->primary('code');
                $table->string('name', 255)->nullable();
                $table->string('description', 255)->nullable();
                $table->integer('status')->default(1);
                $table->string('skill_code')->nullable();
                $table->timestamps();
                $table->softDeletes();
            }
        );
        Schema::create(
            'skillables', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->string('valor', 255)->nullable();
                $table->string('skillable_id')->nullable();
                $table->string('skillable_type', 255)->nullable();
                $table->string('skill_code');
                $table->foreign('skill_code')->references('code')->on('skills');
                $table->timestamps();
                $table->softDeletes();
            }
        );
        // Precido com a de cima mas invez de marcar um valor puro, faz um historico compelto de todas as ações envolidas
        Schema::create(
            'skill_reports', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->uuid('id')->primary();
                $table->string('valor', 255)->nullable();
                $table->string('skillable_id')->nullable();
                $table->string('skillable_type', 255)->nullable();
                $table->string('skill_code');
                $table->foreign('skill_code')->references('code')->on('skills');
                $table->timestamps();
                $table->softDeletes();
            }
        );
        /**
         * caracteristicas
         */
        Schema::create(
            'caracteristicas', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->string('code')->unique();
                $table->primary('code');
                $table->string('name', 255)->nullable();
                $table->string('description', 255)->nullable();
                $table->integer('status')->default(1);
                $table->string('consequencia', 255)->nullable();
                $table->string('motivo', 255)->nullable();
                $table->text('obs')->nullable();
                $table->string('caracteristica_code')->nullable(); // Pai
                $table->timestamps();
                $table->softDeletes();
            }
        );
        // Aonde a caracteristica se aplica, e o valor
        Schema::create(
            'caracteristicables', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->string('valor', 255)->nullable();
                $table->string('caracteristicable_id')->nullable();
                $table->string('caracteristicable_type', 255)->nullable();
                $table->string('caracteristica_code');
                $table->foreign('caracteristica_code')->references('code')->on('caracteristicas');
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
        Schema::dropIfExists('skillables');
        Schema::dropIfExists('skills');
    }

}
