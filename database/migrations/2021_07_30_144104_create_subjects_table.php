<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('subject_teacher');
            $table->string('subject_code');
            $table->mediumText('subject_desc');
            $table->integer('subject_units')->unsigned();
            $table->string('subject_unittype');
            $table->time('subject_from')->default('00:00');
            $table->time('subject_to')->default('00:00');
            $table->string('subject_day');
            $table->string('subject_room');
            $table->foreignId('section_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('subjects');
    }
}
