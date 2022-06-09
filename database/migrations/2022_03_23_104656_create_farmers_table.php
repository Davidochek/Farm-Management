<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender');
            $table->string('age');
            $table->string('education');
            $table->string('phone');
            $table->string('location');
            $table->string('fperiod');
            $table->string('farmsize');
            $table->string('fwithhomestead');
            $table->string('farmanimals');
            $table->string('farmblocks');
            $table->string('farmblocksno');
            $table->string('farmcertifications');
            $table->string('farmownership');
            $table->string('farmtransport');
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
        Schema::dropIfExists('farmers');
    }
}
