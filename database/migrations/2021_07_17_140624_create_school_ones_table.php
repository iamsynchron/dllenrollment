<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolOnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_ones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');
            $table->bigInteger('lrn')->unsigned();
            $table->mediumText('elemSchool');
            $table->year('elemAttended');
            $table->year('elemGraduated');
            $table->mediumText('elemHonor')->nullable();
            $table->mediumText('juniorSchool');
            $table->year('juniorAttended');
            $table->year('juniorGraduated');
            $table->mediumText('juniorHonor')->nullable();
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
        Schema::dropIfExists('school_ones');
    }
}
