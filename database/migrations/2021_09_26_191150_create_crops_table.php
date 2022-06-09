<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crops', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('crop');
            $table->string('season');
            $table->integer('field_id');
            $table->string('avocodvariety');
            $table->string('dateplanted');
            $table->integer('nooftrees');
            $table->integer('certifiedtrees');
            $table->string('beansvariety');
            $table->string('expectedharvestdate');
            $table->string('expectedvolume');
            $table->string('previouscrop');
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
        Schema::dropIfExists('crops');
    }
}
