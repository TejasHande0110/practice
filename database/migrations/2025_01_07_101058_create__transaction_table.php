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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('transaction_id');
            $table->string('name');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('book_id');
            $table->foreign('student_id')->references('student_id')->on('students');
            $table->foreign('book_id')->references('book_id')->on('books');
            $table->string('book_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
