<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaiementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug');
            $table->string('idetudiant');
            $table->string('idrecu');
            $table->string('idmode')->nullable();
            $table->bigInteger('montant');
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
        Schema::dropIfExists('paiements');
    }
}
