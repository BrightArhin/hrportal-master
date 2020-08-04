<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeScoresTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_scores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('appraisal_id')->unsigned()->nullable();
            $table->decimal('score_1');
            $table->string('kpi_1')->nullable();
            $table->decimal('score_2');
            $table->string('kpi_2')->nullable();
            $table->decimal('score_3');
            $table->string('kpi_3')->nullable();
            $table->decimal('score_4');
            $table->string('kpi_4')->nullable();
            $table->decimal('score_5');
            $table->string('kpi_5')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('appraisal_id')->references('id')->on('appraisals');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employee_scores');
    }
}
