<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMattersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('matter');
            $table->string('version');
            $table->string('semester');
            $table->integer('credit');
            $table->integer('ht')->default(0);
            $table->integer('hl')->default(0);
            $table->integer('hp')->default(0);


            $table->unsignedInteger('career_id')->nullable();
            $table->foreign('career_id')->references('id')
                     ->on('careers')
                     ->onDelete('set null');

           
            
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
        Schema::dropIfExists('matters');
    }
}
