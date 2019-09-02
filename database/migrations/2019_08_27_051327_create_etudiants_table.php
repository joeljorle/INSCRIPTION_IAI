<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->nullable();
            $table->string('idclasse');
            $table->string('residence');
            $table->string('name');
            $table->string('surname')->nullable();
            $table->string('image')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('description')->nullable()->default('sans description');
            $table->bigInteger('penalite')->nullable();
            $table->boolean('moratoire')->nullable()->default(false);
            $table->string('insolvable')->nullable()->default(true);
            $table->string('attente')->nullable()->default(false);
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
        Schema::dropIfExists('etudiants');
    }
}
