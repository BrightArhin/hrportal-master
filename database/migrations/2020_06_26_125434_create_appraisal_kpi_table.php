<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppraisalKpiTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appraisal__kpis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('appraisal_id')->unsigned()->nullable();
            $table->integer('kpi_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('appraisal_id')->references('id')->on('appraisals');
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
        Schema::drop('appraisal__kpis');
    }
}
