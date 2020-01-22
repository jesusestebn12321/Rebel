<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_versions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('version');
            $table->longText('justification');
            $table->longText('purpose');
            $table->longText('content');
            $table->longText('methodology');
            $table->longText('evaluation');

            $table->unsignedInteger('content_id')->nullable();
            $table->foreign('content_id')->references('id')
                     ->on('contents')
                     ->onDelete('set null');

            $table->unsignedInteger('matter_id')->nullable();
            $table->foreign('matter_id')->references('id')
                     ->on('matters')
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
        Schema::dropIfExists('content_versions');
    }
}
