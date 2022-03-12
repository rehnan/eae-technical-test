<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_language', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('job_id');
            $table->bigInteger('language_id');

            $table->foreign('job_id')
                ->references('id')
                ->on('job')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('language_id')
                ->references('id')
                ->on('language')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_language');
    }
}
