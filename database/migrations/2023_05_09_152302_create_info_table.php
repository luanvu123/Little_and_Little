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
         if (!Schema::hasTable('info')) {
        Schema::create('info', function (Blueprint $table) {
            $table->id();
            $table->text('text1');
            $table->string('logo');
            $table->text('text2');
            $table->text('text3');
            $table->text('text4')->nullable();
            $table->text('text5');
            $table->text('text6');
            $table->text('text7');
            $table->text('text8');
            $table->text('text9');
            $table->text('text10');
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->string('phonenav');
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info');
    }
};
