<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('employee_id');
            $table->integer('supervisor_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('staff_number')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('birth_date')->nullable();
            $table->date('date_first_appointment')->nullable();
            $table->date('date_last_promotion')->nullable();
            $table->enum('status', ['Active','Inactive'])->nullable();
            $table->rememberToken();
            $table->integer('location_id')->unsigned()->nullable();
            $table->integer('department_id')->unsigned()->nullable();
            $table->integer('grade_id')->unsigned()->nullable();
            $table->integer('qualification_id')->unsigned()->nullable();
            $table->integer('rank_id')->unsigned()->nullable();
            $table->integer('job_id')->unsigned()->nullable();
            $table->integer('role_id')->unsigned()->nullable();
            $table->enum('isAdmin', [1,0])->default(0);
            $table->enum('isSupervisor', [1,0])->default(0);
            $table->enum('isHOD', [1,0])->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('supervisor_id')->references('employee_id')->on('employees')->onDelete('set null');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('set null');;
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('set null');;
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('set null');;
            $table->foreign('rank_id')->references('id')->on('ranks')->onDelete('set null');;
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('set null');;
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');;

            $table->foreign('qualification_id')->references('id')->on('qualifications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employees');
    }
}
