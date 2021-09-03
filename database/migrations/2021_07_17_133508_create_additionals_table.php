<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdditionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additionals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');
            $table->char('insuranceOption', 1);
            $table->string('insurance_lname')->nullable();
            $table->string('insurance_fname')->nullable();
            $table->string('insurance_mname')->nullable();
            $table->mediumText('insurance_address')->nullable();
            $table->string('insurance_mobile')->nullable();
            $table->string('civilstatus');
            $table->string('citizenship');
            $table->string('religion');
            $table->char('specialOption', 1);
            $table->string('specialdisability')->nullable();
            $table->char('indigenousRadio', 1);
            $table->string('indigenousminority')->nullable();
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
        Schema::dropIfExists('additionals');
    }
}
