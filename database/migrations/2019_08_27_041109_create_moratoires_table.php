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
            $table->text('idunite');
            $table->text('idetudiant');
            $table->string('name');
            $table->longText('descrpition')->nullable();
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
