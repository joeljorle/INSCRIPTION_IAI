<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelpaiementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelpaiements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->nullable();
            $table->string('name')->nullable();
            $table->string('idfiliere');
            $table->string('idunite');
            $table->bigInteger('montant');
            $table->date('delais')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('description')->nullable()->default('sans description');
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
        Schema::dropIfExists('modelpaiements');
    }
}
