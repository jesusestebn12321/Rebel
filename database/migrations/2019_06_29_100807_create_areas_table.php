<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('area');

            $table->unsignedInteger('university_id')->nullable();
            $table->foreign('university_id')->references('id')
                     ->on('universities')
                     ->onDelete('set null');

            $table->unsignedInteger('address_id')->nullable();
            $table->foreign('address_id')->references('id')
                     ->on('address')
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
        Schema::dropIfExists('areas');
    }
}
