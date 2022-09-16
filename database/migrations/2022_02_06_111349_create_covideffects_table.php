<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCovideffectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covideffects', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->constrained('users')->nullable();
            $table->integer('doctor_id')->nullable();
            $table->string('doctor_history')->nullable();
            $table->string('email')->unique();
            $table->foreignId('covid_side_effect_id')->constrained('covid_side_effects')->nullable();
            $table->string('on_behalf');
            $table->string('on_behalf_relation');
            $table->string('recipient_name');
            $table->string('age');
            $table->string('gender');
            $table->string('profession');
            $table->string('nation');
            $table->string('vaccine_type');
            $table->string('complaints');
            $table->string('vaccine_date');
            $table->string('vaccine_location');
            $table->string('vaccine_batch');
            $table->string('symptoms');
            $table->string('other_effect')->nullable();
            $table->string('affect_quality')->nullable();
            $table->string('hospitalized')->nullable();
            $table->string('ward_type')->nullable();
            $table->string('hospitalized_duration')->nullable();
            $table->string('hospital_name')->nullable();
            $table->string('effect_duration')->nullable();
            $table->string('present_status')->nullable();
            $table->string('previous_disease')->nullable();
            $table->string('diagnosis')->nullable();
            $table->string('effect_confirm')->nullable();
            $table->string('report')->nullable();
            $table->string('npra')->nullable();
            $table->string('contact')->nullable();
            $table->string('comments')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('covideffects');
    }
}
