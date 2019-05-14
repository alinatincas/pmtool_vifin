<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkPakagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_pakages', function (Blueprint $table) {
            $table->bigIncrements('wp_id');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->integer('total_work');
            $table->string('work_type', 100);
            $table->decimal('Euro_pay', 10, 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_pakages');
    }
}
