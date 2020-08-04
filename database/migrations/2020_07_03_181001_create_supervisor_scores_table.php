<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupervisorScoresTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisor_scores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('appraisal_id')->unsigned()->nullable();
            $table->decimal('score_1');
            $table->decimal('score_2');
            $table->decimal('score_3');
            $table->decimal('score_4');
            $table->decimal('score_5');
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
        Schema::drop('supervisor_scores');
    }
}
