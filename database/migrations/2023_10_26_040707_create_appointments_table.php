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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('address');
            $table->integer('gender');
            $table->date('contact_no');
            $table->date('birthday');
            $table->string('email')->unique();
            $table->string('medical_condition');
            $table->string('target');
            $table->integer('personal_trainer_id');
            $table->integer('appointment_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
