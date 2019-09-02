<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitepaiementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unitepaiements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->nullable();
            $table->string('name');
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
        Schema::dropIfExists('unitepaiements');
    }
}
