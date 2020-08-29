<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppraisalsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appraisals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned()->nullable();
            $table->integer('supervisor_id')->unsigned()->nullable();
            $table->enum('status',['Pending', 'Completed', 'Evaluated', 'Disapproved']);
            $table->enum('promotion_status',['Promotion', 'Double Increment', 'Normal Increment', 'No Increment'])->nullable();
            $table->enum('sup_rating', ['DOUBLE INCREMENT', 'NORMAL INCREMENT', 'NO INCREMENT'])->nullable();
            $table->decimal('average')->nullable();
            $table->integer('kpi_count')->nullable();
            $table->enum('recommended', [1,0])->default(0);
            $table->enum('hod_commented', [1,0])->default(0);
            $table->date('date_of_appraisal');
            $table->string('year')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('set null');;
            $table->foreign('supervisor_id')->references('employee_id')->on('employees')->onDelete('set null');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('appraisals');
    }
}
