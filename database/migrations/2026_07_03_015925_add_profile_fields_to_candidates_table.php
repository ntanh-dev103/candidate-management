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
       Schema::table('candidates', function (Blueprint $table) {

        /*
        |--------------------------------------------------------------------------
        | Personal Information
        |--------------------------------------------------------------------------
        */

        $table->date('date_of_birth')->nullable()->after('status');

        $table->enum('gender',[
            'male',
            'female',
            'other'
        ])->nullable();

        $table->string('avatar_url')->nullable();

        $table->string('address')->nullable();

        $table->string('current_country')->nullable();


        /*
        |--------------------------------------------------------------------------
        | Professional Profile
        |--------------------------------------------------------------------------
        */

        $table->string('headline')->nullable();

        $table->unsignedTinyInteger('experience_years')
              ->default(0);

        $table->enum('education_level',[
            'high_school',
            'college',
            'bachelor',
            'master'
        ])->nullable();

        $table->string('current_job_title')->nullable();

        $table->string('cv_url')->nullable();


        /*
        |--------------------------------------------------------------------------
        | Career Goal
        |--------------------------------------------------------------------------
        */

        $table->string('desired_country')->nullable();

        $table->enum('desired_job_type',[
            'full_time',
            'part_time',
            'contract'
        ])->nullable();

        $table->decimal('desired_salary_min',12,2)
              ->nullable();

        $table->string('desired_salary_currency')
              ->default('JPY');


        /*
        |--------------------------------------------------------------------------
        | Account
        |--------------------------------------------------------------------------
        */

        $table->boolean('is_profile_complete')
              ->default(false);

        $table->timestamp('last_active_at')
              ->nullable();

    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('candidates', function (Blueprint $table) {

        $table->dropColumn([

            'date_of_birth',
            'gender',
            'avatar_url',
            'address',
            'current_country',

            'headline',
            'experience_years',
            'education_level',
            'current_job_title',
            'cv_url',

            'desired_country',
            'desired_job_type',
            'desired_salary_min',
            'desired_salary_currency',

            'is_profile_complete',
            'last_active_at'

        ]);

    });
    }
};
