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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('balance', 6)->default(0);
            $table->bigInteger('role_id')->index()->unsigned();
            $table->text('activation_token')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('is_verified', ['0','1'])->default('0');
            $table->enum('is_active', ['0','1'])->default('0');
            $table->enum('is_login', ['0','1'])->default('0');
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
