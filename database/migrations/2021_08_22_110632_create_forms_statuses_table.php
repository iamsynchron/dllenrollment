<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');
            $table->integer('form1')->unsigned()->nullable();
            $table->integer('form2')->unsigned()->nullable();
            $table->integer('form3')->unsigned()->nullable();
            $table->integer('form4')->unsigned()->nullable();
            $table->integer('form5')->unsigned()->nullable();
            $table->integer('form6')->unsigned()->nullable();
            $table->integer('section')->unsigned()->nullable();
            $table->integer('signature')->unsigned()->nullable();
            $table->softDeletes()->nullable();
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
        Schema::dropIfExists('forms_statuses');
    }
}
