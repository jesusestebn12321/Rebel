<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentMattersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_matters', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedInteger('matter_id')->nullable();
            $table->foreign('matter_id')->references('id')
            ->on('matters')
            ->onDelete('set null');

            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')
            ->on('users')
            ->onDelete('set null');

            $table->integer('version');
            
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
        Schema::dropIfExists('student_matters');
    }
}
