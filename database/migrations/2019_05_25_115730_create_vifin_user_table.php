<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVifinUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vifin_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('lastname_name');
            $table->string('Department')->nullable();
            $table->date('doj');
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
        Schema::dropIfExists('vifin_user');
    }
}
