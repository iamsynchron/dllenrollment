<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');
            $table->char('father_isdeceased', 1)->nullable();
            $table->string('father_lname');
            $table->string('father_fname');
            $table->string('father_mname')->nullable();
            $table->integer('father_age')->unsigned()->nullable();
            $table->string('father_occup')->nullable();
            $table->mediumText('father_address')->nullable();
            $table->string('father_mobile')->nullable();
            $table->char('mother_isdeceased', 1)->nullable();
            $table->string('mother_lname');
            $table->string('mother_fname');
            $table->string('mother_mname')->nullable();
            $table->integer('mother_age')->unsigned()->nullable();
            $table->string('mother_occup')->nullable();
            $table->mediumText('mother_address')->nullable();
            $table->string('mother_mobile')->nullable();
            $table->char('guardianOption', 1);
            $table->string('guardian_rel')->nullable();
            $table->string('guardian_lname')->nullable();
            $table->string('guardian_fname')->nullable();
            $table->string('guardian_mname')->nullable();
            $table->integer('guardian_age')->unsigned()->nullable();
            $table->string('guardian_occup')->nullable();
            $table->mediumText('guardian_address')->nullable();
            $table->string('guardian_mobile')->nullable();
            $table->timestamps();
            $table->softDeletes()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('families');
    }
}
