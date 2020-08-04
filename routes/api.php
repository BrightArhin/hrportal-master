<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('employees', 'EmployeeAPIController');
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('roles', 'RoleAPIController');
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('kpis', 'KpiAPIController');
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('departments', 'DepartmentAPIController');
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('comments', 'CommentAPIController');
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('appraisals', 'AppraisalAPIController');
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('qualifications', 'QualificationAPIController');
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('ranks', 'RankAPIController');
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('locations', 'LocationAPIController');
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('grades', 'GradeAPIController');
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('jobs', 'JobAPIController');
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('scores', 'ScoreAPIController');
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('employee__employees', 'Employee_EmployeeAPIController');
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('employee__roles', 'Employee_RoleAPIController');
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('department__kpis', 'Department_KpiAPIController');
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('kpi__roles', 'Kpi_RoleAPIController');
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('appraisal__kpis', 'Appraisal_KpiAPIController');
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('score__kpis', 'Score_KpiAPIController');
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('employee_scores', 'EmployeeScoreAPIController');
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('supervisor_scores', 'SupervisorScoreAPIController');
});
