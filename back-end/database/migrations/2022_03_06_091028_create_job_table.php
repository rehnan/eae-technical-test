<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('company_id');
            $table->text('logo');
            $table->boolean('new');
            $table->boolean('featured');
            $table->bigInteger('position_id');
            $table->bigInteger('role_id');
            $table->bigInteger('level_id');
            $table->timestamp('posted_at');
            $table->bigInteger('contract_id');
            $table->bigInteger('location_id');

            $table->index('role_id');
            $table->index('level_id');

            $table->foreign('company_id')
                ->references('id')
                ->on('company')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('position_id')
                ->references('id')
                ->on('position')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('role_id')
                ->references('id')
                ->on('role')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('level_id')
                ->references('id')
                ->on('level')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('contract_id')
                ->references('id')
                ->on('contract')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('location_id')
                ->references('id')
                ->on('location')
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
        Schema::dropIfExists('job');
    }
}
