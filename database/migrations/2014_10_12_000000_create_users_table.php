<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('name');
            $table->date('DOB')->nullable();
            $table->string('gender')->nullable();
            $table->float('last_temp')->nullable();
            $table->float('last_weight')->nullable();
            $table->float('last_height')->nullable();
            $table->string('unit_weight')->nullable();
            $table->string('unit_height')->nullable();
            $table->string('image')->nullable();
            $table->string('specialization')->nullable();
            $table->string('institution')->nullable();
            $table->integer('start_year')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_patient')->default(true);
            $table->boolean('is_doctor')->default(false);
            $table->boolean('is_admin')->default(false);
            $table->rememberToken();
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
}
