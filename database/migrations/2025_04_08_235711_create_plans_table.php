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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم الخطة
            $table->string('description'); // وصف الخطة
            $table->decimal('profit_margin', 5, 2); // هامش الربح
            $table->integer('duration_days'); // المدة باليوم
            $table->decimal('price', 10, 2); // سعر الخطة
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
