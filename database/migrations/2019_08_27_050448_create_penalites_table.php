<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenalitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penalites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('idunite')->nullable();
            $table->string('idfiliere')->nullable();
            $table->string('slug')->nullable();
            $table->string('name')->nullable()->default('sans nom');
            $table->longText('description')->nullable()->default('sans description');
            $table->integer('frequence');
            $table->integer('periode');
            $table->bigInteger('montant');
            $table->date('delais')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('penalites');
    }
}
