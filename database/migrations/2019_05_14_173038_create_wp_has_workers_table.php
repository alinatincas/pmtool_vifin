<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWpHasWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wp_has_workers', function (Blueprint $table) {
            $table->primary(['wp_id', 'user_id']);

            $table->integer('wp_id');
            $table->foreign('wp_id')
                ->references('wp_id')->on('work_pakages');


            $table->integer('user_id');
            $table->foreign('user_id')
                ->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wp_has_workers');
    }
}
