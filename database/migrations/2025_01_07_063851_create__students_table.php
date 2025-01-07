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
        Schema::create('Students', function (Blueprint $table) {
            //
            $table->id('student_id');
            $table->string('name');
            $table->string('department');
            $table->bigInteger('pno');
            $table->string('email');
            $table->string('pass');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Students', function (Blueprint $table) {
            //
        });
    }
};
