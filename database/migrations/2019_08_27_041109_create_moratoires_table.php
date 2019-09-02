<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoratoiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moratoires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->nullable();
            $table->text('idunite');
            $table->text('idetudiant');
            $table->string('name')->nullable()->default('sans nom');
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('moratoires');
    }
}
