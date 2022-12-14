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
        Schema::create('user_requirements', function (Blueprint $table) {
            $table->id();
            $table->string('cert');
            $table->string('resume');
            $table->string('recommendation');
            $table->string('passport');
            $table->string('eng_prof');
            $table->string('digi_passport');
            $table->string('sop');
            $table->string('addi_doc');
            $table->timestamps();
        });
    }
// Transcripts/Certificates*

// CV/Resume*

// Letter of Recommendation*

// Age Requirement/Passport Copy*

// English Proficiency Requirement*

// Digital Passport Photograph*

// Personal Statement/SOP*

// Additional Documents*

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_requirements');
    }
};
