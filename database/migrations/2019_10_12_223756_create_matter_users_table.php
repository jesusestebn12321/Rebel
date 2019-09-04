<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matter_users', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('matter_id')->nullable();
            $table->foreign('matter_id')->references('id')
            ->on('matters')
            ->onDelete('set null');

            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')
            ->on('users')
            ->onDelete('set null');

            $table->integer('type')->default(0);
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
        Schema::dropIfExists('matter_users');
    }
}
