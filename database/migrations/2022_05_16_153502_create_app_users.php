<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->date('birth_date');
            $table->string('email', 255);
            $table->string('password', 255);
            $table->string('image', 255)->nullable();
            $table->string('bio', 255)->nullable();
            $table->string('type');
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
        Schema::dropIfExists('app_users');
    }
}
