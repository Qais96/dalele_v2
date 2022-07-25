<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->id();
            $table->string('summary');
            $table->text('status', 255);
            $table->integer('patient_Fk');
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
        Schema::dropIfExists('cases');
    }
}
