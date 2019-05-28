<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('project_id');
            $table->string('project_name', 100);
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->text('description');
            $table->string('contact_name', 100);
            $table->string('contact_phone', 100);
            $table->string('contact_email');
            $table->string('grant_agree', 100);
            $table->string('coord_partner', 100);
            $table->string('org_name', 100);
            $table->string('staff_member', 100);
            $table->string('staff_category', 100);
            $table->string('image_url');
            $table->string('company_logo');
            $table->string('sponsor_img');
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
        Schema::dropIfExists('projects');
    }
}