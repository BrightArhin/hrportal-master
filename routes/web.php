<?php

use App\Mail\AppraisalMail;
use App\Models\Appraisal;
use App\Models\Department;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//
//Route::view('/client/{path?}', 'react');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware(['verified']);


Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'isAdmin']], function () {
    Route::resource('employees', 'EmployeeController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'isAdmin']], function () {
    Route::resource('roles', 'RoleController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'isAdmin']], function () {
    Route::resource('kpis', 'KpiController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'isAdmin']], function () {
    Route::resource('departments', 'DepartmentController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'isAdmin']], function () {
    Route::resource('comments', 'CommentController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'isAdmin']], function () {
    Route::resource('appraisals', 'AppraisalController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'isAdmin']], function () {
    Route::resource('qualifications', 'QualificationController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'isAdmin']], function () {
    Route::resource('ranks', 'RankController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'isAdmin']], function () {
    Route::resource('locations', 'LocationController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'isAdmin']], function () {
    Route::resource('grades', 'GradeController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'isAdmin']], function () {
    Route::resource('jobs', 'JobController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'isAdmin']], function () {
    Route::resource('scores', 'ScoreController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'isAdmin']], function () {
    Route::resource('employeeEmployees', 'Employee_EmployeeController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'isAdmin']], function () {
    Route::resource('employeeRoles', 'Employee_RoleController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'isAdmin']], function () {
    Route::resource('departmentKpis', 'Department_KpiController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'isAdmin']], function () {
    Route::resource('kpiRoles', 'Kpi_RoleController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'isAdmin']], function () {
    Route::resource('departmentKpis', 'Department_KpiController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'isAdmin']], function () {
    Route::resource('appraisalKpis', 'Appraisal_KpiController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'isAdmin']], function () {
    Route::resource('appraisalKpis', 'Appraisal_KpiController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'isAdmin']], function () {
    Route::resource('employeeEmployees', 'Employee_EmployeeController', ["as" => 'admin']);
});


Route::group(['prefix'=>'client', 'middleware'=>'auth'],function(){
    Route::resource('comment', 'EmployeeCommentController', ["as"=>'client']);
});

Route::get('admin/home', function(){
    return view('home');
})->name('admin.home')->middleware(['auth', 'isAdmin']);

Route::get('client.approval', 'EmployeeAppraisalController@fetchToBeApprovedAppraisals' )->name('client.approval')->middleware('auth');


Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'isAdmin']], function () {
    Route::resource('scoreKpis', 'Score_KpiController', ["as" => 'admin']);
});

Route::group(['prefix'=>'client', 'middleware'=>'auth'],function(){
    Route::resource('emp_appraise', 'EmployeeAppraisalController', ["as"=>'client']);
});

Route::group(['prefix'=>'client', 'middleware'=>'auth'],function(){
    Route::resource('sup_appraise', 'SupervisorAppraisalController', ["as"=>'client']);
});

Route::get('client/sup_appraise/getForm/{id}', 'SupervisorAppraisalController@getEmployeeAppraisalForm')->name('employee_form')->middleware('auth');
Route::post('client/sup_appraise/storeEmployeeAppraisal/', 'SupervisorAppraisalController@storeEmployeeAppraisal')->name('store_appraisal')->middleware('auth');
Route::get('client/disapproved', 'EmployeeAppraisalController@getDisapprovedAppraisals')->name('client.disapproved')->middleware('auth');
Route::get('client/approved', 'EmployeeAppraisalController@getApprovedAppraisals')->name('client.approved')->middleware('auth');
Route::get('client/pending', 'EmployeeAppraisalController@pendingAppraisals')->name('client.pending')->middleware('auth');
Route::get('client/appraisal_details/{id}', 'EmployeeAppraisalController@appraisalDetails')->name('client.appraisal_details')->middleware('auth');
Route::get('client/pending_details/{id}', 'EmployeeAppraisalController@pendingDetails')->name('client.pending_details')->middleware('auth');
Route::get('client/appraised_employees', 'SupervisorAppraisalController@getAppraisedEmployees')->name('client.appraised_employees')->middleware('auth');
Route::get('client/report', 'SupervisorAppraisalController@searchForReport')->name('client.report')->middleware('auth');
Route::get('/about', function (){
    return view('client.about');
})->middleware('auth')->middleware('auth');
Route::get('/profile', function (){
    return view('client.profile');
})->middleware('auth')->name('profile')->middleware('auth');
Route::get('/policy', function(){
    return view('client.policy');
})->name('policy')->middleware('auth');
Route::get('client/sendAppraisalAlerts', 'SupervisorAppraisalController@sendAppraisalAlerts')->name('sendAppraisalAlerts')->middleware(['auth', 'isHrManager']);

Route::get('/bio_welcome', function(){
        $employee= Auth::user()->load('supervisors');
        $supervisor = $employee->supervisors()->first();

    return view('client.dashboards.welcomeBio', compact(['supervisor']));
})->name('bio-welcome')->middleware('auth');

Route::get('/committee', 'CommiteeRecommendationController@showdepartments')->name('committee_show')->middleware(['auth', 'isHrManager']);
Route::get('/recommendation_list/{id}', 'CommiteeRecommendationController@recommendation_list')->name('recommendation_list')->middleware(['auth','isHrManager']);
Route::get('/recommend_appraisal_details/{id}','CommiteeRecommendationController@appraisalDetails')->name('recommend_appraisal_details')->middleware(['auth', 'isHrManager']);
Route::post('/store_recommendation/{id}','CommiteeRecommendationController@store')->name('store_recommendation')->middleware(['auth', 'isHrManager']);
Route::post('/getSupervisor', 'EmployeeController@getSupervisor')->middleware('auth');
Route::get('/get_reports', 'SupervisorAppraisalController@getReports')->name('get_reports');
Route::patch('/password_change', 'EmployeeController@changePassword')->name('change_password')->middleware('auth');
Route::get('/dept_list', 'HrReportController@showAllDepts')->name('client.dept_list')->middleware(['auth', 'isHrManager']);
Route::get('/incomplete_dept_list', 'HrReportController@showAllDeptsIncomplete')->name('client.dept_list_incomplete')->middleware(['auth', 'isHrManager']);

Route::get('/dept_reports', 'HrReportController@index')->name('dept_reports')->middleware(['auth', 'isHrManager']);
Route::get('/department_listing/{id}', 'HrReportController@getCompleteReport')->name('department_listing')->middleware(['auth','isHrManager']);
Route::get('/incomplete_listing/{id}', 'HrReportController@getInCompleteReport')->name('incomplete_listing')->middleware(['auth','isHrManager']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');


Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'isAdmin']], function () {
    Route::resource('employeeScores', 'EmployeeScoreController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'isAdmin']], function () {
    Route::resource('supervisorScores', 'SupervisorScoreController', ["as" => 'admin']);
});


//Route::get('/get', function(){
//    if(Carbon::now()->month === 8){
//
//    }
//});

