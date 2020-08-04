<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoreKpisTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score__kpis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('score_id')->unsigned()->nullable();
            $table->integer('kpi_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('score_id')->references('id')->on('scores');
            $table->foreign('kpi_id')->references('id')->on('kpis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('score__kpis');
    }
}
