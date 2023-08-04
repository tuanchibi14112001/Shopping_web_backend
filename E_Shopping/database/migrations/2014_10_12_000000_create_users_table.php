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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            $table->string('avatar')->nullable();
            $table->tinyInteger('level');
            $table->text('description')->nullable();

            $table->string('company_name')->default('ABC')->nullable();
            $table->string('country')->default('Viet Nam')->nullable();
            $table->string('street_address')->default('03 Hai Ba Trung')->nullable();
            $table->string('postcode_zip')->default('10000')->nullable();
            $table->string('town_city')->default('Ha Noi')->nullable();
            $table->string('phone')->default('0971528595')->nullable();


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
