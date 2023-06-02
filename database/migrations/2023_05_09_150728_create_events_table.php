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
         if (!Schema::hasTable('events')) {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('title_order');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('price', 10, 0);
            $table->integer('status');
            $table->string('image');
            $table->string('image2');
            $table->string('image3');
            $table->longText('description1');
            $table->longText('description2');
            $table->longText('description3');
            $table->string('ngaytao');
            $table->string('ngaycapnhat');
            // $table->timestamps();
        });
    }
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
};
