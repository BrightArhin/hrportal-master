<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpiRolesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi__roles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kpi_id')->unsigned()->nullable();
            $table->integer('role_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('kpi_id')->references('id')->on('kpis');
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kpi__roles');
    }
}
