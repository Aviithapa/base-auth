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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('registration_number');
            $table->string('designation');
            $table->string('gender');
            $table->string('dob');
            $table->string('citizenship_number');
            $table->string('issued_district');
            $table->string('email');
            $table->string('contact_number');
            $table->string('qualification');
            $table->string('institution_attended');
            $table->string('graduation_year');
            $table->string('workplace_name');
            $table->string('workplace_address');
            $table->string('position');
            $table->string('employment_type');
            $table->text('roles');
            $table->text('training_reason');

            $table->unsignedBigInteger('user_id')->nullable();  // Add user_id field
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
