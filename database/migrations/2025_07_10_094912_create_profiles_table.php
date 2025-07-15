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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
                $table->unsignedBigInteger('created_by')->nullable();
                  $table->unsignedBigInteger('updated_by')->nullable();
            // Personal Details
            $table->string('name');
            $table->string('gender')->nullable();
            $table->string('country_code')->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('email')->unique()->nullable();
            $table->date('dob')->nullable();
            $table->string('religion')->nullable();
            $table->string('community')->nullable();
            $table->string('marital_status')->nullable();
            $table->json('mother_tongue')->nullable();
            $table->json('diet')->nullable();
            $table->string('citizenship')->nullable();
            $table->json('drinking')->nullable();
            $table->json('smoking')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('height')->nullable();
            $table->string('health_status')->nullable();
            $table->time('time_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            // Family Details
            $table->string('father_profession')->nullable();
            $table->string('mother_profession')->nullable();
            $table->unsignedInteger('brothers')->nullable();
            $table->unsignedInteger('married_brothers')->nullable();
            $table->unsignedInteger('sisters')->nullable();
            $table->unsignedInteger('married_sisters')->nullable();
            $table->string('family_affluence')->nullable();
            $table->string('family_values')->nullable();
            $table->string('registering_for')->nullable();
            // Education Details
            $table->string('school_college_name')->nullable();
            $table->string('degree')->nullable();
            $table->string('year_of_passing')->nullable();
            // Career Details
            $table->string('highest_qualification')->nullable();
            $table->string('education_field')->nullable();
            $table->string('occupation')->nullable();
            $table->string('company_name')->nullable();
            $table->string('annual_income')->nullable();
            $table->string('work_location')->nullable();
            // Partner Preference
            $table->unsignedInteger('partner_age_min')->nullable();
            $table->unsignedInteger('partner_age_max')->nullable();
            $table->json('partner_mother_tongue')->nullable();
            $table->string('partner_religion')->nullable();
            $table->string('partner_community')->nullable();
            $table->string('partner_marital_status')->nullable();
            $table->string('partner_caste')->nullable();
            $table->string('partner_manglik')->nullable();
            $table->string('partner_gotra')->nullable();
            $table->string('partner_education_field')->nullable();
            $table->string('partner_occupation')->nullable();
            $table->string('partner_annual_income')->nullable();
            // Photos
            $table->json('photos')->nullable();
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
           $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};