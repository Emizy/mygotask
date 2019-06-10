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
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('business')->unique();
            $table->string('address')->nullable();
            $table->string('state')->nullable();
            $table->string('local_govt')->nullable();
            $table->string('image')->default('avatar.png');
            $table->string('activate_token')->nullable();
            $table->string('email_confirmation')->default('NO');
            $table->string('account_status')->default('UNCOMPLETED');
            $table->string('dob')->nullable();
            $table->string('business_type')->nullable();
            $table->text('about_us')->nullable();
            $table->string('password');
            $table->string('con_password');
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
