<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentKpisTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department__kpis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id')->unsigned()->nullable();
            $table->integer('kpi_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('department_id')->references('id')->on('departments');
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
        Schema::drop('department__kpis');
    }
}
