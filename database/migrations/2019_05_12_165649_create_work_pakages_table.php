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
            $table->bigIncrements('id');
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->integer('total_work');
            $table->char('work_type', 100);
            $table->decimal('Euro_pay');
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
        Schema::dropIfExists('work_pakages');
    }
}
