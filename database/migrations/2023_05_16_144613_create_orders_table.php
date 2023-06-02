<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
          if (!Schema::hasTable('orders')) {
       Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('order_info');
            $table->integer('number');
            $table->date('date');
            $table->float('amount');
            $table->string('fullname');
            $table->string('phone');
            $table->string('email');
            $table->string('package_name');
             $table->json('event_data')->default(null);
             $table->string('qr_code');
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
