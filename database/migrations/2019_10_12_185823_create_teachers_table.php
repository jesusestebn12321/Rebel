<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')
            ->on('users');
            
            $table->unsignedInteger('rol_id')->nullable();
            $table->foreign('rol_id')->references('id')
            ->on('rols');

            $table->boolean('admin_confirmed')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
