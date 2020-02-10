<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDownloadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('downloads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('user_agent');
            
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')
                  ->on('users')
                  ->onDelete('set null');
            
            $table->string('start_student')->nullable();
            $table->string('last_student')->nullable();
            $table->boolean('status');
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
        Schema::dropIfExists('downloads');
    }
}
