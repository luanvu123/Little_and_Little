<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {

          if (!Schema::hasTable('tickets')) {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('package')->nullable();
            $table->integer('number')->nullable();
            $table->date('date')->nullable();
            $table->string('fullname')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('price')->nullable();
            $table->timestamps();
        });
    }
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};
