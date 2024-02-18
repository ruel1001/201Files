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
        Schema::create('faculty', function (Blueprint $table) {
            $table->increments('employee_id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('date_of_birth');
            $table->string('place_of_birth');
            $table->string('sex');
            $table->string('civil_status');
            $table->string('citizenship');
            $table->string('gsis_id');
            $table->string('pag_ibig_id');
            $table->string('sss_id');
            $table->string('resid_add');
            $table->string('mobile_no');
            $table->string('tin');
            $table->string('department');
            $table->string('status');
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculty');
    }
};