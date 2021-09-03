<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateSchoolTwosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_twos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');

            $table->mediumText('seniorSchool');
            $table->mediumText('seniorStrand');
            $table->year('seniorAttended');
            $table->year('seniorGraduated');
            $table->mediumText('seniorHonor')->nullable();

            $table->char('vocationalCheck', 1)->nullable();
            $table->mediumText('vocationalSchool')->nullable();
            $table->string('vocationalCourse')->nullable();
            $table->char('vocationalOptiongrad', 1)->nullable();
            $table->string('vocationalUnits')->nullable();
            $table->year('vocationalAttended')->nullable();
            $table->year('vocationalGraduated')->nullable();
            $table->mediumText('vocationalHonor')->nullable();

            $table->char('collegeCheck', 1)->nullable();
            $table->mediumText('collegeSchool')->nullable();
            $table->string('collegeCourse')->nullable();
            $table->char('collegeOptiongrad', 1)->nullable();
            $table->string('collegeUnits')->nullable();
            $table->year('collegeAttended')->nullable();
            $table->year('collegeGraduated')->nullable();
            $table->mediumText('collegeHonor')->nullable();

            $table->char('transferCheck', 1)->nullable();
            $table->mediumText('transferSchool')->nullable();
            $table->string('transferCourse')->nullable();
            $table->string('transferUnits')->nullable();
            $table->year('transferAttended')->nullable();
            $table->year('transferTransferred')->nullable();

            
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
        Schema::dropIfExists('school_twos');
    }
}
