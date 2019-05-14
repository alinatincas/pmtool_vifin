<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimesheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timesheet', function (Blueprint $table) {
            $table->bigIncrements('ts_id');
            $table->dateTime('date');
            $table->integer('project_id');
            $table->foreign('project_id')->references('project_id')->on('projects');
            $table->integer('wp_id');
            $table->foreign('wp_id')->references('wp_id')->on('work_pakages');
            $table->text('activity');
            $table->decimal('hours_spent', 10, 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timesheet');
    }
}
