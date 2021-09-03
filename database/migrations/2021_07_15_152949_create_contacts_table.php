<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');
            $table->string('mobilenumber')->nullable();
            $table->string('telephonenumber')->nullable();
            $table->mediumText('res_street')->nullable();
            $table->string('res_brgy');
            $table->string('res_city');
            $table->string('res_province');
            $table->integer('res_zip');
            $table->char('is_permanent', 1)->nullable();
            $table->mediumText('per_street')->nullable();
            $table->string('per_brgy')->nullable();
            $table->string('per_city')->nullable();
            $table->string('per_province')->nullable();
            $table->integer('per_zip')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
