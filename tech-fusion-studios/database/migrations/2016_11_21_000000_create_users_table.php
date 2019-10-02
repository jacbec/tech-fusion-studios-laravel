<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('full_name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->boolean('email_confirmed')->nullable();
            $table->string('phone_number', 10)->nullable();
            $table->boolean('phone_number_confirmed')->nullable();
            $table->string('avatar')->nullable();
            $table->string('password');
            $table->string('security_token')->nullable();
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
