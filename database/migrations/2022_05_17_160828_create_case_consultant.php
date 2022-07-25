<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseConsultant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_consultant', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_Fk');
            $table->integer('consalutant_Fk');
            $table->integer('case_Fk');
            $table->timestamp('first_session');
            $table->integer('Is_deleted')->default(0);
            $table->timestamp('Created_at')->useCurrent();
            $table->timestamp('Updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('case_consultant');
    }
}
