<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimesheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timesheets', function (Blueprint $table) {
            $table->bigIncrements('ts_id');
            $table->dateTime('ts_date');
            $table->string('project_name');
            $table->foreign('project_name')->references('project_name')->on('projects');
            $table->string('wp_name');
            $table->foreign('wp_name')->references('wp_name')->on('work_pakages');
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
        Schema::dropIfExists('timesheets');
    }
}