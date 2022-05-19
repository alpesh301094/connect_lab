<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('mobile_number')->nullable();
            $table->string('profile')->nullable();
            $table->date('dob')->nullable();
            $table->string('company_name');
            $table->string('company_site');
            $table->text('company_description')->nullable();
            $table->string('designation');
            $table->date('interview_date')->nullable();
            $table->enum('interview_type',['Normal','Difficult','Hard'])->nullable();
            $table->string('skill')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
};
