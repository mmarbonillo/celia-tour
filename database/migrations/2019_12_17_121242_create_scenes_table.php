<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scenes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->float('pitch',5,4);
            $table->float('yaw',5,4);
            $table->integer('top');
            $table->string('left');
            $table->string('directory_name');
            $table->integer('id_zone');
            $table->boolean('principal')->default(false);
            $table->boolean('cover')->default(false);
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent();
            //$table->timestamps()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scenes');
    }
}
