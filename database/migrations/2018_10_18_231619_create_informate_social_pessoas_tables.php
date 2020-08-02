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
        
        
        Schema::create(
            'gostos', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->string('code')->unique();
                $table->primary('code');
                $table->string('name', 255)->nullable();
                $table->string('text', 255)->nullable();
                $table->string('description', 255)->nullable();
                $table->integer('status')->default(1);
                $table->string('gosto_code')->nullable();
                $table->timestamps();
                $table->softDeletes();
            }
        );
        
        Schema::create(
            'gostoables', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->string('gosto_code')->nullable();
                $table->string('valor', 255)->nullable();
                $table->string('gostoable_id');
                $table->string('gostoable_type', 255);
                $table->timestamps();
                $table->softDeletes();
            }
        );
        
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
