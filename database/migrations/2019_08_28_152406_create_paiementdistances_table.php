<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaiementdistancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiementdistances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->nullable();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('url')->nullable();
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
        Schema::dropIfExists('paiementdistances');
    }
}
