<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('experts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // relation with users

            $table->string('name_of_expert');
            $table->string('qualification')->nullable();
            $table->string('affiliation')->nullable();
            $table->text('key_expertise')->nullable();
            $table->integer('experience')->nullable()->comment('Years of experience');
            $table->text('trainings_attended')->nullable();
            $table->text('trainings_delivered')->nullable();
            $table->json('training_materials')->nullable(); // store media/materials as JSON array
            $table->boolean('availability')->default(false);
            $table->string('expected_compensation')->nullable();
            $table->longText('letter_of_motivation')->nullable();
            $table->string('preferred_area_of_engagement')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experts');
    }
};
