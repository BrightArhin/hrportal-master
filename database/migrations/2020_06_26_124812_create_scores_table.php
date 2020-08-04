<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('appraisal_id')->unsigned()->nullable();
            $table->decimal('staff_score_1')->nullable()->unsigned();
            $table->decimal('supervisor_score_1')->nullable()->unsigned();
            $table->integer('kpi_id_1')->unsigned()->nullable();
            $table->decimal('staff_score_2')->nullable()->unsigned();
            $table->decimal('supervisor_score_2')->nullable()->unsigned();
            $table->integer('kpi_id_2')->unsigned()->nullable();
            $table->decimal('staff_score_3')->nullable()->unsigned();
            $table->decimal('supervisor_score_3')->nullable()->unsigned();
            $table->integer('kpi_id_3')->unsigned()->nullable();
            $table->decimal('staff_score_4')->nullable()->unsigned();
            $table->decimal('supervisor_score_4')->nullable()->unsigned();
            $table->integer('kpi_id_4')->unsigned()->nullable();
            $table->decimal('staff_score_5')->nullable()->unsigned();
            $table->decimal('supervisor_score_5')->nullable()->unsigned();
            $table->integer('kpi_id_5')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('appraisal_id')->references('id')->on('appraisals');
            $table->foreign('kpi_id_1')->references('id')->on('kpis');
            $table->foreign('kpi_id_2')->references('id')->on('kpis');
            $table->foreign('kpi_id_3')->references('id')->on('kpis');
            $table->foreign('kpi_id_4')->references('id')->on('kpis');
            $table->foreign('kpi_id_5')->references('id')->on('kpis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('scores');
    }
}
