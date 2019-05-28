<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('fname', 100);
            $table->string('lname', 100);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 100);
            $table->string('usertype', 100);
            $table->string('phone_no', 100);
            $table->decimal('pay', 10, 0);
            $table->tinyInteger('active');
            $table->string('user_img');
            $table->string('dep_name');
            $table->foreign('dep_name')->references('dep_name')->on('department');
            $table->string('pos_name');
            $table->foreign('pos_name')->references('pos_name')->on('position');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}