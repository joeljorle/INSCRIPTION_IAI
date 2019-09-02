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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('surname')->nullable();
            $table->string('image')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->boolean('online')->nullable()->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->bigInteger('montantpenalite')->nullable()->default(0);
            $table->string('idprivileges')->default();
            $table->string('description')->nullable()->default('sans description');
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
