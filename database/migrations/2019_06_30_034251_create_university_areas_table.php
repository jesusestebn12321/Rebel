<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniversityAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('university_areas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();

            $table->unsignedInteger('university_id')->nullable();
            $table->foreign('university_id')->references('id')
                     ->on('universities')
                     ->onDelete('set null');

            $table->unsignedInteger('area_id')->nullable();
            $table->foreign('area_id')->references('id')
                     ->on('areas')
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
        Schema::dropIfExists('university_areas');
    }
}
